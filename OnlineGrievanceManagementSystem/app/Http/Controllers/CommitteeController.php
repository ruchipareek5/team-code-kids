<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use App\Grievance;
use App\GrievanceMessage;
use App\Student;
use DB;


class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function takeAction(Request $request) {
        $grievance = Grievance::find($request->id);
        $grievance->status = 'inaction';
        $grievance->save();
         return ['message' => 'Grievance Status Updated Successfully', 'id' => $request->id, 'status' => Response::HTTP_ACCEPTED];
    }

    public function index()
    {
        //
    }

    public function grievanceDetails($type){
        $id = Session::get('user_id');
        //$id = 1;
        $condition = DB::select("SELECT user_principal.college_id, user_committee_member.assigned_committee FROM user_committee_member INNER JOIN 
            user_principal ON user_principal.id = user_committee_member.created_by WHERE user_committee_member.id = ".$id);

        $array = [];
        if($type=='new'){
            $grievance = DB::select("SELECT table_grievance.id, table_grievance.type, table_grievance.description, table_grievance.documents, table_grievance.eta
            FROM table_grievance INNER JOIN user_student ON user_student.id = table_grievance.student_id 
            WHERE user_student.college_id = ".$condition[0]->college_id." AND table_grievance.type = '".$condition[0]->assigned_committee."'
            AND table_grievance.status = 'raised'");
        }
        elseif ($type=='inaction'){
            $grievance = DB::select("SELECT table_grievance.id, table_grievance.type, table_grievance.description, table_grievance.documents, table_grievance.eta,table_grievance.level
            FROM table_grievance INNER JOIN user_student ON user_student.id = table_grievance.student_id 
            WHERE user_student.college_id = ".$condition[0]->college_id." AND table_grievance.type = '".$condition[0]->assigned_committee."'
            AND table_grievance.status = 'inaction'");
        }elseif ($type=='addressed'){
            $grievance = DB::select("SELECT table_grievance.id, table_grievance.type, table_grievance.description, table_grievance.documents, table_grievance.eta, 
            table_grievance.updated_at, table_grievance.delayed_status 
            FROM table_grievance INNER JOIN user_student ON user_student.id = table_grievance.student_id 
            WHERE user_student.college_id = ".$condition[0]->college_id." AND table_grievance.type = '".$condition[0]->assigned_committee."'
            AND table_grievance.status = 'addressed'");
        }
        else {
            $data = [
                'message' => 'Wrong url return',
                'status' => "'" . Response::HTTP_NOT_FOUND . "'"
            ];
            return $data;
        }

        return response(['message'=> $grievance], 200);

    }

    public function viewStudent(Request $request){
        $student = Student::find($request->id);

        return response(['message'=> $student]);
    }

    public function seekForApproval(Request $request){
        $grievance = Grievance::find($request->id);
        $grievance->level = $grievance->level + 1;

        return response(['message'=> $grievance->level]);
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
