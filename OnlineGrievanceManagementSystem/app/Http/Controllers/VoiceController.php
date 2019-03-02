<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grievance;
use Illuminate\Support\Facades\DB;

class VoiceController extends Controller
{


    /**
     *
     * This method return the response to the voice app webhook
     * @return 
     *
     */

    public function voiceActions(Request $req){
        $data = $req->json()->all();
        $intent = $data['queryResult']['intent']['displayName'];
        $parameters = $data['queryResult']['parameters'];

        if(strtolower($intent) == "formsubmission"){
            $responseFromFunction = $this->reportGrievanceVoice($parameters);
            $response =[
            "fulfillmentText" => $responseFromFunction,
            "fulfillmentMessages" => [ 
                [
                "text"=> [
                          "text" => [
                            $responseFromFunction
                          ]
                        ]
                ]   
            ]
        ];
        return json_encode($response);
        }
        else if(strtolower($intent) == "countaffiliatedinstitutes"){
            $responseFromFunction = $this->getNumberOfInstitutesAffiliatedVoice();
            $response =[
            "fulfillmentText" => $responseFromFunction,
            "fulfillmentMessages" => [ 
                [
                "text"=> [
                          "text" => [
                            $responseFromFunction
                          ]
                        ]
                ]   
            ]
        ];
        return json_encode($response);
        }
        else if(strtolower($intent) == "countreportedgrievances"){
            $responseFromFunction = $this->getNumberOfGrievanceReportedVoice();
            $response =[
            "fulfillmentText" => $responseFromFunction,
            "fulfillmentMessages" => [ 
                [
                "text"=> [
                          "text" => [
                            $responseFromFunction
                          ]
                        ]
                ]   
            ]
        ];
        return json_encode($response);
        }
                else if(strtolower($intent) == "countsolvedgrievances"){
            $responseFromFunction = $this->getNumberOfAddressedGrievanceVoice();
            $response =[
            "fulfillmentText" => $responseFromFunction,
            "fulfillmentMessages" => [ 
                [
                "text"=> [
                          "text" => [
                            $responseFromFunction
                          ]
                        ]
                ]   
            ]
        ];
        return json_encode($response);
        }
                else if(strtolower($intent) == "pendinggrievances"){
            $responseFromFunction = $this->getNumberOfDelayedGrievanceVoice();
            $response =[
            "fulfillmentText" => $responseFromFunction,
            "fulfillmentMessages" => [ 
                [
                "text"=> [
                          "text" => [
                            $responseFromFunction
                          ]
                        ]
                ]   
            ]
        ];
        return json_encode($response);
        }

        else{
        $responseFromFunction="Oops! Here you caught me, I don't know the answer for this";
        $response =[
            "fulfillmentText" => $responseFromFunction,
            "fulfillmentMessages" => [ 
                [
                "text"=> [
                          "text" => [
                            $responseFromFunction
                          ]
                        ]
                ]   
            ]
        ];
        return json_encode($response);    
        }
            
    }


     public function reportGrievanceVoice($parameter){
        $type = $parameter['typeOfGrievance'];
        $description = $parameter['grievanceDescription'];
        $file = null;
        $student_id = DB::table('user_student')->where('id',1)->get(['id','college_id'])->first();
        $department_id = DB::table('table_department')->where('type','LIKE',$type)->where('college_id',$student_id->college_id)->get(['id'])->first();
        $grievance = new Grievance;
        $grievance->type = $type;
        $grievance->description = $description;
        $grievance->student_id = $student_id->id;
        $grievance->department_id = $department_id->id;
        $grievance->documents = $file==null?'':$file->store('documents');
        $grievance->status = 'raised';
        $grievance->eta = DB::raw('DATE_ADD(NOW(),INTERVAL 7 DAY)');
        $responseGrievanceReport = $grievance->save();
        if($responseGrievanceReport == true){
            $new_grievance = DB::table('table_grievance')->where('student_id',$student_id->id)->orderBy('id','desc')->get(['id'])->first();
            $new_grievance_id = $new_grievance->id;
            $register_grievance_response = "Your grievance is registered having ID ".$new_grievance_id.". Please let me know what else can I help you with.";
            return (string)$register_grievance_response;
        }
        else{
            return "Oh! There is some issue in registering your grievance. What else can I help you with?";
        }
    }

    public function getNumberOfInstitutesAffiliatedVoice(){
        $totalInstitutesAffiliated = DB::select("SELECT COUNT(*) as institutesAffiliated FROM grievancesystem.table_college");
        $numberOfInstitutesAffiliated = $totalInstitutesAffiliated[0]->institutesAffiliated;
        if($numberOfInstitutesAffiliated==0){
            return "Please try later, currently I don't have any records of affiliated institutes. I am working on it. Can I tell you anything else?";
        }
        else{
            $numberOfInstitutesAffiliatedVoice = $numberOfInstitutesAffiliated.", There are ".$numberOfInstitutesAffiliated." institutes affiliated by AICTE. What else would you like to know?";
            return (string)$numberOfInstitutesAffiliatedVoice;
        }
        

    }
    public function getNumberOfGrievanceReportedVoice(){
        $reportedGrievances = DB::select("SELECT count(*) as reportedGrievance FROM grievancesystem.table_grievance");
        $totalGrievancesReported = $reportedGrievances[0]->reportedGrievance;
        if($totalGrievancesReported == 0){
            return "Oops! Currently I don't have any records of affiliated institutes. I will check. Would you like to know anything else?";
        }
        else{
            $totalGrievancesReportedVoice = "There are ".$totalGrievancesReported." grievances reported to AICTE. This is nice students are becoming vocal. What else do you want to know?";
             return (string)$totalGrievancesReportedVoice;
        }
       

    }
    public function getNumberOfAddressedGrievanceVoice(){
        $addressedGrievances = DB::select("SELECT count(*) as addressedGrievances FROM grievancesystem.table_grievance where table_grievance.status = 'addressed'");
        $totalAddressedGrievances = $addressedGrievances[0]->addressedGrievances;
        if($totalAddressedGrievances == 0){
            return "There are no grievances addressed in the records for now. AICTE is working on it. What else do you want to know?";
        }
        else{
            $totalAddressedGrievancesVoice = "There are ".$totalAddressedGrievances." grievances reported to AICTE. AICTE is doing a great job. Please let me know what else should I tell you?";
             return (string)$totalAddressedGrievancesVoice;
        }

    }
    public function getNumberOfDelayedGrievanceVoice(){
         $delayedGrievances = DB::select("SELECT COUNT(*) as delayedGrievance FROM grievancesystem.table_grievance where table_grievance.status = 'delayed'");
        $totalDelayedGrievances = $delayedGrievances[0]->delayedGrievance;
        if($totalDelayedGrievances == 0){
            return "There are no grievances pending. AICTE is working really well. What else can I tell you?";
        }
        else{
            $totalDelayedGrievancesVoice = "There are only ".$totalDelayedGrievances." grievances pending. Please ask what else can I tell you?";
            return (string)$totalDelayedGrievancesVoice;
        }
        
    }
    

}
