<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Grievance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class grievanceController extends Controller
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
        $type = $request->get('type');
        $description = $request->get('description');
        $file = $request->get('file');
        $student_id = DB::table('user_student')->where('email',Auth::user()->email)->get(['id','college_id']);
        $department_id = DB::table('table_department')->where('type',$type)->get(['']);
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Auth::user()->email;
        $student_id = DB::table('user_student')->where('email', $email)->get(['id']);
        $grievances = DB::table('table_grievance')->where('id',$id)->get(['id','type','created_at','documents','department_id']);
        $grievance_status = DB::table('table_grievance_status')->where('grievance_id',$id)->get(['status','eta']);
        $department_name = DB::table('table_department')->where('id',$grievances[0]->department_id)->get(['name']);
        $data = [
            'id' => $grievances[0]->id,
            'type' => $grievances[0]->type,
            'created_at'=> $grievances[0]->created_at,
            'documents' => $grievances[0]->documents,
            'committe_assigned' => $department_name[0]->name,
            'status' => $grievance_status[0]->status,
            'eta' => $grievance_status[0]->eta
        ];
        return json_encode($data);
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
