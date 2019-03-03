<?php

namespace App\Http\Controllers;
use App\Http\Middleware\BasicAuth;
use App\Mail\GrievanceMail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\User;
use App\Grievance;
use App\GrievanceStatus;
use App\Student;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
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
        if($type=='open'){
            $array = ['raised','reopened'];
        }
        elseif ($type=='inaction'){
            $array = ['delayed','inaction'];
        }elseif ($type=='addressed'){
            $array = ['addressed'];
        }
        else {
            $data = [
                'message' => 'Wrong url return',
                'status' => "'" . Response::HTTP_NOT_FOUND . "'"
            ];
            return $data;
        }
        $student_id = Session::get('user_id');
        $grievances = Grievance::where('student_id',$student_id)->whereIn('status',$array)->orderBy('updated_at','desc')
                      ->get(['id','type','sub_category','timeslot','eta','documents','created_at','updated_at','description','status']);


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
        $sub_category = $request->get('subCategory');
        $description = $request->get('detail');
        $file = $request->file('attachment');
        $timeslot = $request->get('timeSlot');
        $student_id = DB::table('user_student')->where('id',Session::get('user_id'))->get(['id','college_id'])->first();
        $department_id = DB::table('table_department')->where('type','LIKE',$type)->where('college_id',$student_id->college_id)->get(['id'])->first();
        $grievance = new Grievance;
        $grievance->type = $type;
        $grievance->description = $description;
        $grievance->student_id = $student_id->id;
        $grievance->department_id = $department_id->id;
        $grievance->documents = $file==null?'':$file->store('documents');
        $grievance->status = 'raised';
        $grievance->eta = DB::raw('DATE_ADD(NOW(),INTERVAL 7 DAY)');
        $grievance->sub_category = $sub_category;
        $grievance->timeslot = $timeslot;
        $grievance->save();



        $data = [];
        $new_grievance = DB::table('table_grievance')->where('student_id',$student_id->id)->orderBy('id','desc')->get(['id'])->first();
        //Data insertion in grievance status table
        $data = [
          'id' => $new_grievance->id,
          'message' => 'Your grievance is registered'
        ];
        $email = DB::select('select email from users u,table_grievance g, user_committee_member c,user_principal p,
                user_student s where g.type = c.assigned_committee and g.student_id = s.id and p.id = c.created_by and p.college_id = s.college_id and u.id = c.user_id and g.id ='.$data['id']);
        $data = ['id'=>$data['id'],'description'=>$description];

        Mail::to($email[0]->email)->send(new GrievanceMail($data['id'],$data['description']));

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

        $data = Grievance::find($id);
        if($data != null)
        return response(['message'=>$data],200);
        else
            return response(['message'=>'No data available for the given ID '.$id],404);
    }



    public function statistics($type){

        $student_id = Session::get('user_id');

        if($type == 'total'){
            $count = Grievance::all()->where('student_id',$student_id)->count();
            return ['type' => $type,'value'=>$count];
        }
        elseif ($type == 'addressed'){

            $count = Grievance::where('student_id',$student_id)->whereIn('status',['resolved','addressed'])->count();
            return ['type' => $type,'value'=>$count];
        }
        elseif ($type == 'open'){
            $array = ['raised', 'inaction'];
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
        $grievance = Grievance::find($request->id);
        $grievance->status = 'reopened';
        $grievance->save();

        return ['message' => 'Grievance Status Updated Successfully', 'id' => $request->id, 'status' => Response::HTTP_ACCEPTED];

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


    public function getRemarks($id)
    {

        $remarks = \App\GrievanceMessage::where('grievance_id', $id)->get();

        if ($remarks == null) {
            return response(['message' => 'Remarks not found'], 400);
        }
        $comment = [];
        $i = 0;
        foreach ($remarks as $remark) {
            $comment[$i] = new Comment();
            if ($remarks == null)
                return response(['message' => 'No Remarks Yet'], 200);
            $comment[$i]->grievance_id = $remark->grievance_id;
            $comment[$i]->message = $remark->message;
            $name_and_role = grievanceController::getName($remark->sender_id);
            $comment[$i]->commented_by = $name_and_role['name'] . " (" . $name_and_role['roles'] . ")";
            $comment[$i++]->updated_at = $remark->updated_at;
        }


        if ($remarks == null)
            return response(['message' => 'No Remarks Yet'], 200);
        else {

            if ($remarks == null)
                return response(['message' => 'No Remarks Yet'], 400);
            else {

                return response(['message' => $comment], 200);


            }
        }
    }
    public function addRemarks(Request $request){

        $roles = Auth::user()->roles;

        if($roles == null)
            return \response(['message'=>'Please do logout and login again'],401);


        $student_id = Session::get('user_id');
        // $student_id = 1;

        $sender_id = Auth::user()->id;
        // $sender_id = 1;


        // if ($roles == 'student')
        //     $table_name = 'user_student';
        // elseif ($roles == 'principal')
        //     $table_name = 'user_pricipal';
        // elseif ($roles == 'ombudman')
        //     $table_name = 'user_ombudsman';
        // elseif ($roles == 'aicte')
        //     $table_name = 'user_aicte';
        // elseif ($roles == 'committee member')
        //     $table_name = 'user_committee_member';
        // else
        // return response(["message"=>'No User found'], 403);

        // $user_name = DB::table($table_name)->where('user_id',Auth::user()->getAuthIdentifier())->get(['name'])->first();

        // if($user_name == null)
        //     return response(['message'=>'No such user'],403);
      //  try {


        $file = $request->file('attachment');
        dump($request);
        if($file != null) {
            $path = $file == null ? '' : $file->store('documents');
            if ($path == null)
                return \response(['message' => 'Error in uploading your file'], 500);
            DB::table('table_message')->insert( array( 'grievance_id' => $request->grievance_id,
                'message' => $request->message,
                'sender_id' => $sender_id,
            ));
            DB::select("UPDATE table_grievance SET vendor_attachment='".$path."', vendor_status = 'delivered' WHERE id=".$request->grievance_id);
        }
        else
        {
            DB::table('table_message')->insert( array( 'grievance_id' => $request->grievance_id,
                'message' => $request->message,
                'sender_id' => $sender_id)
            );
        }

        return response(['message' => 'Comment Added'], 200);
        //}catch (QueryException $ex){
          //  return \response(['message'=>'Error in Query Building'],500);
        //}
    }


    public static function getName($id){
        $user = User::find($id);
        if($user == null)
            return \response(['message'=>'No user associated with this id '.$id],404);
        $roles = $user->roles;
        $table_name="";
        if($roles == 'student')
            $table_name = 'user_student';
        elseif ($roles == 'principal')
            $table_name = 'user_principal';
        elseif ($roles == 'ombudsman')
            $table_name = 'user_ombudsman';
        elseif ($roles == 'aicte')
            $table_name = 'user_aicte';
        elseif ($roles == 'committee member')
            $table_name = 'user_committee_member';
        elseif($roles == 'vendor')
            $table_name = 'user_vendor';
        $name = DB::table($table_name)->where('user_id',$id)->get(['name'])->first();

        if($name == null){
            return response(['message'=>'No such user'],403);
        }
        return ['name'=>$name->name,'roles'=>$roles];

}

    public function getCommittee(Request $request){
        $grievance = Grievance::find($request->id);
        $student_id = $grievance->student_id;
        $college_id = Student::find($student_id)->get(['college_id']);

        $committee = DB::select("SELECT * FROM user_committee_member INNER JOIN user_principal ON
            user_committee_member.created_by = user_principal.id WHERE user_principal.college_id = ".$college_id[0]->college_id." 
            AND user_committee_member.assigned_committee = '".$grievance->type."'");

        return response(['message' => $committee], 200);
    }
   
}

class Comment {
    public $grievance_id;
    public $message;
    public $commented_by;
    public $updated_at;

}
