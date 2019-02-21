<?php

namespace App\Http\Controllers;
use App\Http\Middleware\BasicAuth;
use Illuminate\Http\Request;
use App\User;
use App\Grievance;
use App\GrievanceStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
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

    }


    public function grievanceDetails($type){
        $array = [];
        if($type=='pending'){
            $array = ['raised','addressed'];
        }
        elseif ($type=='escalated'){
            $array = ['delayed','reopened'];
        }elseif ($type=='resolved'){
            $array = ['resolved'];
        }
        else {
            $data = [
                'message' => 'Wrong url return',
                'status' => "'" . Response::HTTP_NOT_FOUND . "'"
            ];
            return $data;
        }
        $student_id = Session::get('user_id');
        $grievances = Grievance::where('student_id',$student_id)->whereIn('status',$array)->orderBy('id','asc')
                      ->get(['id','type','eta','status','documents','created_at']);


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
        $type = $request->get('type');
        $description = $request->get('detail');
        $file = $request->file('attachment');
        $student_id = DB::table('user_student')->where('user_id',Auth::user()->getAuthIdentifier())->get(['id','college_id']);
        $department_id = DB::table('table_department')->where('name','LIKE',$type)->where('college_id',$student_id[0]->college_id)->get(['id']);
        $grievance = new Grievance;
        $grievance->type = $type;
        $grievance->description = $description;
        $grievance->student_id = $student_id[0]->id;
        $grievance->department_id = $department_id[0]->id;
        $grievance->documents = $file==null?'':$file->storeAs('documents',$file->getClientOriginalName());
        $grievance->save();
        $data = [];
        $new_grievance = DB::table('table_grievance')->where('student_id',$student_id[0]->id)->orderBy('id','desc')->get(['id'])->first();
        //Data insertion in grievance status table
        DB::table('table_grievance_status')->insert(
            [
                'grievance_id' => $new_grievance->id,
                'status' => 'raised',
                'eta' => 7,
                'level' => 1
            ]
        );
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
        $data = Grievance::find($id)->committee_member;
        $data = Grievance::find($id);
        $data1 = Grievance::find($id)->committee_member;
        return response(['message'=>json_encode(array_merge(json_decode($data, true),json_decode($data1, true)))],200);
    }



    public function statistics($type){

        $student_id = Session::get('user_id');
        if($type == 'total'){
            $count = Grievance::all()->where('student_id',$student_id)->count();
            return ['type' => $type,'value'=>$count];
        }
        elseif ($type == 'satisfied'){

            $count = Grievance::where('student_id',$student_id)->whereIn('status',['resolved'])->count();
            return ['type' => $type,'value'=>$count];
        }
        elseif ($type == 'pending'){
            $array = ['raised','addressed'];
            $count = Grievance::where('student_id',$student_id)->whereIn('status',$array)->count();
            return ['type' => $type,'value'=>$count];
        }

        elseif ($type == 'escalated'){
            $array = ['delayed','reopened'];
            $count = Grievance::where('student_id',$student_id)->whereIn('status',$array)->count();
            return ['type' => $type,'value'=>$count];
        }

        else {
            $data = [
                'message' => 'Wrong url return',
                'status' => "'" . Response::HTTP_NOT_FOUND . "'"
            ];
            return $data;
        }

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

    public function updateStatus(Request $request)
    {
        $id=$request->get('id');

        if($request->get('action') == '0'){
           $grievance = Grievance::find($id);
           $grievance->status = 'escalated';
           $grievance->eta = 7;
           $grievance->save();
        }
        else if($request->get('action')=='1'){
            $grievance = Grievance::find($id);
            $grievance->status = 'resolved';
            $grievance->eta = DB::raw('CURRENT_TIMESTAMP');
            $grievance->save();
        }
        else return ['message'=>'Invalid Action value','status'=>Response::HTTP_NOT_MODIFIED];
        return ['message'=>'Successfully updated','id'=>$request->get($id),'status'=>Response::HTTP_ACCEPTED];

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
            $path = '/documents/'.$path;
            return Storage::download($path);
        }
    }
   
}
