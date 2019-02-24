<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Grievance;
use App\GrievanceMessage;
use App\Student;
use DB;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    public function grievanceDetails($type){
        $id = Session::get('user_id');
        //$id = 1;

        $college_id = DB::select("SELECT college_id FROM user_principal WHERE id = ".$id);

        if($type == 'seeking'){
            $grievances = DB::select("SELECT id, type, description, documents, eta FROM table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE table_grievance.level = 1 AND table_grievance.delayed_status = 0 
            AND table_grievance.status = 'inaction' AND user_student.college_id = ".$college_id);

            return response(['message' => $grievances], 200);
        }
        else if($type == 'esclated') {
            $grievances = DB::select("SELECT id, type, description, documents, eta FROM table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE table_grievance.level = 1 AND table_grievance.delayed_status = 1 
            AND user_student.college_id = ".$college_id);

            return response(['message' => $grievances], 200);
        }
        else if($type == 'resolved') {
            $grievances = DB::select("SELECT id, type, description, documents, eta FROM table_grievance INNER JOIN user_student
            ON table_grievance.student.id = user_student.id WHERE table_grievance.status = 'addressed' AND user_student.college_id = ".$college_id);

            return response(['message' => $grievances], 200);
        }
        else{
            return response(['messsage' => 'Invalid Request'], 404);
        }
    }

    //public function grievanceDetails

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
        $gid = Auth::user()->id;
         // $user_id = DB::table('users')->where('email', $email)->get(['id']);
         // return  $user_id->id;

        $data = Grievance::find($id);
        if($data != null)
        return response(['message'=>$data],200);
        else
            return response(['message'=>'No data available for the given ID '.$id],404);
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

    public function getStatistics($type){
        $id = Auth::user()->id;
        //$id = 1;
        $college_id = DB::select("SELECT college_id FROM user_principal WHERE id = ".$id);

        if($type=='total'){
            $count = DB::select("SELECT count(*) as total from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->college_id);
            
            return response(['message'=>$count],200);
        }elseif ( $type=='pending' ){
            $count = DB::select("SELECT count(*) as count from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->college_id." AND table_grievance.status IN ('raised', 'inaction')");
            
            return response(['message'=>$count],200);
        }elseif ( $type=='escalated' ){
            $count = DB::select("SELECT count(*) as count from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->college_id." AND table_grievance.status IN ('delayed', 'reopened')");
            return response(['message'=>$count],200);
        }elseif ( $type=='satisfied' ){
            $count = DB::select("SELECT count(*) as count from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->college_id." AND table_grievance.status IN ('resolved', 'addressed')");
            
            return response(['message'=>$count],200);
        }
        else{
            return response(['message'=>'Invalid type'],404);
        }
    }

    public function committeeStatistics($committee){
        $id = Auth::user()->id;
        //$id = 1;
        $college_id = DB::select("SELECT college_id FROM user_principal WHERE id = ".$id);
        
        $grievance_count = DB::select("SELECT count(*) as count, table_grievance.status from table_grievance INNER JOIN user_student
        ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->college_id." 
        AND table_grievance.type = '".$committee."' GROUP BY table_grievance.status ORDER BY count desc");

        $data=[];
        $i=0;
        foreach ($grievance_count as $ex){
            $data[$i++]=[
                $ex->status,$ex->count
            ];
        }

        return response([$data], 200);
    }

    public function topFiveCommittee(){
              
    }

    public function grievanceTypes(){
        $id = Auth::user()->id;
        //$id = 1;
        $college_id = DB::select("SELECT college_id FROM user_principal WHERE id = ".$id);

        $count = DB::select("SELECT count(*) as total from table_grievance INNER JOIN user_student
            ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->college_id);
        
        $grievance_count = DB::select("SELECT count(*) as count, table_grievance.type from table_grievance INNER JOIN user_student
        ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$college_id[0]->college_id." 
        GROUP BY table_grievance.type ORDER BY count desc");

        $data=[];
        $i=0;
        foreach ($grievance_count as $ex){
            $data[$i++]=[
                $ex->type,$ex->count
            ];
        }

        return $data;
    }
}
