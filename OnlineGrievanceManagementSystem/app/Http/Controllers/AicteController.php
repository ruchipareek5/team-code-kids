<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Grievance;
use App\GrievanceMessage;
use DB;
use Illuminate\Support\Facades\Auth;

class AicteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $array = ['raised', 'delayed', 'reopened', 'inaction'];

        $grievances = Grievance::whereIn('status',$array)->where('level', 3)->orderBy('id','asc')
                      ->get(['id','student_id','type','eta','status','documents','created_at']);

        if($grievances == null)
            return \response(['message'=>'No data found'],404);
        return response(['message'=>$grievances],200);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // AICTE search grievances
    public function searchGrievances(Request $request){
        if($request->type == 1){
            $grievances = DB::select("SELECT table_grievance.id, student_id, user_student.college_id, user_student.university_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
            user_student ON table_grievance.student_id = user_student.id WHERE table_grievance.id = ".$request->data." order by table_grievance.updated_at desc");
        }
        else if($request->type == 2){
            $grievances = DB::select("SELECT table_grievance.id, student_id, user_student.college_id, user_student.university_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
            user_student ON table_grievance.student_id = user_student.id WHERE user_student.id = ".$request->data." order by table_grievance.updated_at desc");
        }
        else if($request->type == 3){
            $grievances = DB::select("SELECT table_grievance.id, student_id, user_student.college_id, user_student.university_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
                user_student ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$request->data." order by table_grievance.updated_at desc");
        }
        else if($request->type == 4){
            $grievances = DB::select("SELECT table_grievance.id, student_id, user_student.college_id, user_student.university_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
                user_student ON table_grievance.student_id = user_student.id WHERE table_grievance.type = '".$request->data."' order by table_grievance.updated_at desc");
        }
        else{
            $data = [
                'message' => 'Wrong url return',
                'status' => 404
            ];
            return $data;
        }

        if($grievances == null)
            return response(['message'=> 'No data found'], 404);

        return response(['message'=>$grievances],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function addComment(Request $request){

        $roles = Auth::user()->roles;
        $id = Session::get('user_id');
        if($id == null)
            return \response(['message'=>'Please do logout and login again'],401);
        DB::table('table_message')->insert( array( 'grievance_id' => $request->grievance_id, 'message' => $request->message, 'sender_id' => $id));
   
        return response(["message"=>'Updated Successfully'], 200);
    }

    public function getRemarks($id){
        $remarks = GrievanceMessage::where('grievance_id',$id)->get();
        if($remarks == null)
            return response(['message'=>'No Remarks Yet'],200);
        else{
            return \response(['message'=>$remarks],200);
        }
    }

    public function getAllGrievancesCollegeWise(Request $request){

        $college_id = DB::select("SELECT id FROM table_college WHERE name = '".$request->collegeName."'");

        $result = DB::select("SELECT * from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->id." order by table_grievance.updated_at desc");
            
           if($result == null)
            return response(['message'=>'No results Yet'],200);
        else{
            return response(['message'=>$result],200);
        }
    }


     public function getAllGrievancesUniversityWise(Request $request){

        $university_id = DB::select("SELECT id FROM table_university WHERE name = '".$request->universityName."'");

        $result = DB::select("SELECT * from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.university_id = ".$university_id[0]->id." order by table_grievance.updated_at desc");
            
           if($result == null)
            return response(['message'=>'No results Yet'],200);
        else{
            return response(['message'=>$result],200);
        }
    }

    public function getAllGrievancesStateWise(Request $request){

        $university_id = DB::select("SELECT id FROM table_university WHERE state = '".$request->state."'");

        $result = DB::select("SELECT * from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.university_id = ".$university_id[0]->id." order by table_grievance.updated_at desc");
            
           if($result == null)
            return response(['message'=>'No results Yet'],200);
        else{
            return response(['message'=>$result],200);
        }
    }

    public function getMajorGrievances(){
        $array = ['Ragging', 'Security'];

        $grievances = Grievance::whereIn('type',$array)->orderBy('id','desc')
                      ->get(['id','student_id','type','eta','status','documents','created_at']);

        if($grievances == null)
            return \response(['message'=>'No data found'],404);
        return response(['message'=>$grievances],200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
