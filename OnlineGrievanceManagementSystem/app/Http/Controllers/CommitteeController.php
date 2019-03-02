<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Grievance;
use App\GrievanceMessage;
use App\Student;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getStatistics($type){

        $id = Session::get('user_id');
        if($id == null)
            return \response(['message'=>'Please Login again'],401);
        //$id = 1;
        $college_id = DB::select("SELECT p.college_id,c.assigned_committee FROM user_principal p,user_committee_member c WHERE p.id=c.created_by and  c.id = ".$id);


        if($college_id == null)
            return \response(['message'=>'No data found for you'],403);

        if($type=='total'){
            $count = DB::select("SELECT count(*) as count from table_grievance g INNER JOIN user_student
            ON g.student_id = user_student.id WHERE g.type='".$college_id[0]->assigned_committee."' and user_student.college_id = ".$college_id[0]->college_id);
            $data = $count[0]->count;
            return response(['value'=>$data],200);
        }elseif ( $type=='pending' ){
            $count = DB::select("SELECT count(*) as count from table_grievance g INNER JOIN user_student
            ON g.student_id = user_student.id WHERE g.type='".$college_id[0]->assigned_committee."' and user_student.college_id = ".$college_id[0]->college_id." AND g.status IN ('raised', 'inaction')");
            $data = $count[0]->count;
            return response(['value'=>$data],200);
        }elseif ( $type=='escalated' ){
            $count = DB::select("SELECT count(*) as count from table_grievance g INNER JOIN user_student
            ON g.student_id = user_student.id WHERE g.type='".$college_id[0]->assigned_committee."' and user_student.college_id = ".$college_id[0]->college_id." AND g.status IN ('delayed', 'reopened')");
            $data = $count[0]->count;
            return response(['value'=>$data],200);
        }elseif ( $type=='satisfied' ){
            $count = DB::select("SELECT count(*) as count from table_grievance g INNER JOIN user_student
            ON g.student_id = user_student.id WHERE g.type='".$college_id[0]->assigned_committee."' and user_student.college_id = ".$college_id[0]->college_id." AND g.status IN ('resolved', 'addressed')");

            $data = $count[0]->count;

            return response(['value'=>$data],200);
        }
        else{
            return response(['message'=>'Invalid type'],404);
        }
    }



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
            user_principal ON user_principal.id = user_committee_member.created_by WHERE user_committee_member.id = '".$id."'");

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
        $grievance = Grievance::find($request->id);
        $student_id = $grievance->student_id;
        $student = Student::find($student_id);

        return response(['message'=> $student]);
    }

    public function seekForApproval(Request $request){
        $grievance = Grievance::find($request->id);
        $grievance->level = $grievance->level + 1;
        $grievance->save();
        if(!$grievance)
             return response(['message'=> "No Grievance with Grievance Id ".$request->id]);
        return response(['message'=> "Grievance is sent for higher Approval"]);
    }

    public function markAddressed(Request $request){
        $grievance = Grievance::find($request->id);
        if(!$grievance)
             return response(['message'=> "No Grievance with Grievance Id ".$request->id]);
        $grievance->status = 'addressed';
        $grievance->save();

        return response(['message'=> "Grievance Id ".$request->id."is Addressed"]);
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

    public function getGraphController(){

        $id = Session::get('user_id');

        $college = DB::select('select p.college_id, c.assigned_committee as committee from  user_principal p,
                    user_committee_member c where c.id='.$id.' and c.created_by = p.id limit 1');
        if($college==null){
            return response(['message'=>'sorry College Id not available for the logged in user'],401);
        }
        $college_id = $college[0]->college_id;

        $course = DB::select('select user_student.course from user_student where user_student.college_id = '.$college[0]->college_id.' 
                    group by course order by course asc');


       $i=0;
            foreach ($course as $c){
                $courses['course'][$i++]=$c->course;
            }

        $all_data=[];
        $data = [];
        $i=0;
        //foreach ($course as $c){
            $temp=DB::select('select count(*) as count , user_student.course from table_grievance,user_student where table_grievance.type =
                  '."'".$college[0]->committee."'".' and table_grievance.student_id = user_student.id and user_student.college_id =
                  '.$college[0]->college_id.'  group by user_student.course order by user_student.course asc');

            $mp = DB::select('select count(*) as count , user_student.course from table_grievance,user_student where table_grievance.type =
                  '."'".$college[0]->committee."'".' and table_grievance.student_id = user_student.id and user_student.college_id =
                  '.$college[0]->college_id.' and
                    table_grievance.status not  in ('."'resolved','addressed'".') group by user_student.course order by user_student.course asc');
           // return [$temp,$mp];
            $pending[$i++]=$mp==null?0:$mp[0]->count;
        //}
        $all_data=[];


            $temp_data = new temp();
            $temp_data->name = ['Total'];
            $i=0;

            foreach ($course as $c){
                if($i< count($temp))
                    $temp_data->data[$i] = ($temp==null)?0:$temp[$i]->count;
                else
                    $temp_data->data[$i] = 0;
                $i++;
            }
            $all_data[0]=$temp_data;

            $temp_data = new temp();
            $temp_data->name = ['Pending'];
            $i=0;
            foreach ($course as $c){
                if ($i < count($mp))
                    $temp_data->data[$i] = ($mp==null)?0:$mp[$i]->count;
                    else
                        $temp_data->data[$i] = 0;
                $i++;
            }
            $all_data[1]=$temp_data;


        $courses['all_data'] = $all_data;
        return response(['message'=>$courses],200);

    }

    public function getYearWiseFiledGrievances(){
        $department = DB::select('select assigned_committee from user_committee_member where id = '.Session::get('user_id').' limit 1');

        if($department == null){
            return \response(['message'=>'Sorry no data found'],404);
        }
        $id =DB::select('Select p.college_id from user_principal p,user_committee_member c where c.created_by = p.id');
        if($id == null)
            return \response(['message'=>'Your college id is not found in the database'],404);
        $students_ = DB::select("Select id from user_student where college_id =".$id[0]->college_id);
        $students = [];
        $i=0;
        foreach ($students_ as $s){
            $students[$i++]=$s->id;
        }
        $department_id = $department[0]->assigned_committee;
        $date = date('Y');

       /* $data = ['year'=>[$date,$date-1,$date-2,$date-3,$date-4]];
        $all_data=[];
        for($i = 0; $i< 5; $i++){
            $startyear = ($date-$i).'-01-01 00:00:00';
            $endyear = ($date+1-$i).'-01-01 00:00:00';
            $count = DB::select("SELECT count(*) as 'year' FROM `table_grievance` WHERE `created_at` < '$endyear' and created_at > '$startyear' and department_id =".$department_id);
            $year = new Year();
            $year->count = $count[0]->year;
            $all_data[$i]=$year;
        }
        $data['all_data']=$all_data;
        return \response(['message'=>$data],200);*/
        $startyear = ($date).'-01-01 00:00:00';
        $endyear = ($date+1).'-01-01 00:00:00';

        $count1 = Grievance::whereIn('student_id',$students)->where('created_at','>',$startyear)->where('created_at','<',$endyear)->where('type',$department_id)->count();

        $startyear = ($date-1).'-01-01 00:00:00';
        $endyear = ($date).'-01-01 00:00:00';
        $count2 = Grievance::whereIn('student_id',$students)->where('created_at','>',$startyear)->where('created_at','<',$endyear)->where('type',$department_id)->count();
        $startyear = ($date-2).'-01-01 00:00:00';
        $endyear = ($date-1).'-01-01 00:00:00';
        $count3 = Grievance::whereIn('student_id',$students)->where('created_at','>',$startyear)->where('created_at','<',$endyear)->where('type',$department_id)->count();
        $startyear = ($date-3).'-01-01 00:00:00';
        $endyear = ($date-2).'-01-01 00:00:00';
        $count4 = Grievance::whereIn('student_id',$students)->where('created_at','>',$startyear)->where('created_at','<',$endyear)->where('type',$department_id)->count();
        $startyear = ($date-4).'-01-01 00:00:00';
        $endyear = ($date-3).'-01-01 00:00:00';
        $count5 = Grievance::whereIn('student_id',$students)->where('created_at','>',$startyear)->where('created_at','<',$endyear)->where('type',$department_id)->count();

        return response(['count'=>[$count1,$count2,$count3,$count4,$count5],'year'=>[$date,$date-1,$date-2,$date-3,$date-4]],200);

    }
}

 class temp{
    public $name;
    public $data;
}

class Year{
    public $count;
}
