<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grievance;
use App\GrievanceMessage;
use DB;
class AicteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $array = ['raised', 'addressed', 'delayed', 'reopened'];

        $grievances = Grievance::whereIn('status',$array)->where('level', 3)->orderBy('id','asc')
                      ->get(['id','student_id','type','eta','status','documents','created_at']);


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
            $grievances = DB::select("SELECT table_grievance.id, student_id, user_student.college_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
            user_student ON table_grievance.student_id = user_student.id WHERE table_grievance.id = ".$request->data);
        }
        else if($request->type == 2){
            $grievances = DB::select("SELECT table_grievance.id, student_id, user_student.college_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
            user_student ON table_grievance.student_id = user_student.id WHERE user_student.id = ".$request->data);
        }
        else if($request->type == 3){
            $grievances = DB::select("SELECT table_grievance.id, student_id, user_student.college_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
                user_student ON table_grievance.student_id = user_student.id WHERE user_student.college_id = ".$request->data);
        }
        else if($request->type == 4){
            DB::select("SELECT table_grievance.id, student_id, user_student.college_id, type, eta, status, documents, created_at FROM table_grievance INNER JOIN 
                user_student ON table_grievance.student_id = user_student.id WHERE table_grievance.type = ".$request->data);
        }
        else{
            $data = [
                'message' => 'Wrong url return',
                'status' => "'" . Response::HTTP_NOT_FOUND . "'"
            ];
            return $data;
        }

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
