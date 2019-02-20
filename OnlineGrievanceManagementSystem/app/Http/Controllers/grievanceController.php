<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BasicAuth;
use Illuminate\Http\Request;
use App\User;
use App\Grievance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $type = $request->get('grievance_against');
        $description = $request->get('details');
        $file = $request->get('selected_file');
        $student_id = DB::table('user_student')->where('user_id',Auth::user()->getAuthIdentifier())->get(['id','college_id']);
        $department_id = DB::table('table_department')->where('name','LIKE',$type)->where('college_id',$student_id[0]->college_id)->get(['id']);

        $grievance = new Grievance;
        $grievance->type = $type;
        $grievance->description = $description;
        $grievance->student_id = $student_id[0]->id;
        $grievance->department_id = $department_id[0]->id;
        $grievance->documents = $file==null?'':$file->store();
        $grievance->save();

        $data = [];
        $new_grievance = DB::table('table_grievance')->where('student_id',$student_id[0]->id)->orderBy('id','desc')->get(['id'])->first();
        $data = [
          'id' => $new_grievance->id,
          'message' => 'Your grievance is registered'
        ];
        return json_encode($data);
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
        $student_id = DB::table('user_student')->where('user_id', $gid)->get(['id'])->pluck('id');
        $grievances = DB::table('table_grievance')->where(['id'=>$id,
            'student_id'=>$student_id])->get(['id','type','student_id','created_at','documents','department_id']);
        if($grievances->isEmpty())
            return response(['message'=>'No such grievance'],404);
        $grievance_status = DB::table('table_grievance_status')->where('grievance_id',$id)->get(['status','eta']);
        $department_name = DB::table('table_department')->where('id',$grievances[0]->department_id)->get(['name']);
        $data = [
            'grievance_id' => $grievances[0]->id,
            'grievance_type' => $grievances[0]->type,
            'data_of_issue'=> $grievances[0]->created_at,
            'attachment' => $grievances[0]->documents,
            'assigned_committee' => $department_name[0]->name,
            'status' => $grievance_status[0]->status,
            'eta' => $grievance_status[0]->eta
        ];
       
        return response(['message'=>$data],200);
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

    public function download($path){
        if($path != null){
            return Storage::download($path);
        }
    }
}
