<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Grievance;
use App\GrievanceMessage;
use App\Student;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OmbudsmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::check())
            return \response(['message'=>'Please do logout and login again'],401);
        $id = Session::get('user_id');
        //$id = 1;
        $university = DB::select("SELECT user_ombudsman.university_id FROM user_ombudsman WHERE id = ".$id);
        if($university == null)
            return response(['messsage' => 'No such university exists'], 404);
        $university_id = $university[0]->university_id;

        $array = ['raised', 'delayed', 'reopened', 'inaction'];

        $grievances = DB::select("SELECT table_grievance.id, table_grievance.student_id, user_student.college_id, table_grievance.type, 
        table_grievance.created_at, table_grievance.eta, table_grievance.documents FROM table_grievance INNER JOIN user_student ON
        table_grievance.student_id = user_student.id WHERE user_student.university_id = ".$university_id." AND table_grievance.status
        IN ('raised', 'inaction', 'reopened', 'delayed') order by table_grievance.updated_at desc");

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

    public function searchGrievances(Request $request){

        $id = Session::get('user_id');
        if($id == null)
            return \response(['message'=>'Please do logout and login again'],401);


        $university = DB::select("SELECT university_id FROM user_ombudsman WHERE id = ".$id);
        if($university == null)
            return response(['messsage' => 'No such university exists'], 404);
        $university_id = $university[0]->university_id;

        if($request->type == 1){
            $grievances = DB::select("SELECT table_grievance.id, user_student.college_id, table_grievance.type, table_grievance.created_at, 
            table_grievance.eta, table_grievance.documents FROM table_grievance INNER JOIN user_student ON table_grievance.student_id = user_student.id WHERE 
            user_student.university_id = ".$university_id." AND table_grievance.id = ".$request->data." order by table_grievance.updated_at desc");
        }
        else if($request->type == 2){
            $grievances = DB::select("SELECT table_grievance.id, user_student.college_id, table_grievance.type, table_grievance.created_at, 
            table_grievance.eta, table_grievance.documents FROM table_grievance INNER JOIN user_student ON table_grievance.student_id = user_student.id WHERE 
            user_student.university_id = ".$university_id." AND user_student.college_id = ".$request->data." order by table_grievance.updated_at desc");
        }
        else if($request->type == 3){
            $grievances = DB::select("SELECT table_grievance.id, user_student.college_id, table_grievance.type, table_grievance.created_at, 
            table_grievance.eta, table_grievance.documents FROM table_grievance INNER JOIN user_student ON table_grievance.student_id = user_student.id WHERE 
            user_student.university_id = ".$university_id." AND table_grievance.type = '".$request->data."' order by table_grievance.updated_at desc");
        }
        else{
            $data = [
                'message' => 'Wrong url return',
                'status' => "'" . Response::HTTP_NOT_FOUND . "'"
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
