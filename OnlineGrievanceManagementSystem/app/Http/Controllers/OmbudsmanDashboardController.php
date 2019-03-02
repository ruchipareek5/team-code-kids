<?php

namespace App\Http\Controllers;

use App\Grievance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OmbudsmanDashboardController extends Controller
{
    public $id;
    public function getStatistics($type)
    {

        $id = Session::get('user_id');
        if($id == null)
            return response(['message'=>'You are not logged in'],401);

        $university_id = DB::table('user_ombudsman')->where('id', $id)->get(['university_id'])->first();
        if ($university_id == null)
            return response(['message' => 'No data found for the logged in user'], 404);
        $college = DB::table('table_college')->where('university_id', $university_id->university_id)->get(['id']);
        $college_id = [];
        $i = 0;
        foreach ($college as $c) {
            $college_id[$i++] = $c->id;
        }
        $student = DB::table('user_student')->whereIn('college_id', $college_id)->get(['id']);
        $student_id = [];
        $i = 0;
        foreach ($student as $s) {
            $student_id[$i++] = $s->id;
        }
        if ($type == 'total') {
            $count = DB::table('table_grievance')->whereIn('student_id', $student_id)->count();
            return response(['message' => $count], 200);
        } elseif ($type == 'escalated') {
            $count = DB::table('table_grievance')->whereIn('student_id', $student_id)->whereIn('status', ['reopened', 'delayed'])->count();
            return response(['message' => $count], 200);
        } elseif ($type == 'addressed') {
            $count = DB::table('table_grievance')->whereIn('student_id', $student_id)->whereIn('status', ['resolved', 'addressed'])->count();
            return response(['message' => $count], 200);
        } elseif ($type == 'open') {
            $count = DB::table('table_grievance')->whereIn('student_id', $student_id)->whereIn('status', ['raised', 'inaction',])->count();
            return response(['message' => $count], 200);
        } else {
            return response(['message' => 'Invalid Request'], 404);
        }
    }

    public function getCollegeNameAndId(){
        $id = Session::get('user_id');
        if($id == null)
            return response(['message'=>'You are not logged in'],401);
        $university = DB::select('select university_id from user_ombudsman where id = '.$id);
        if($university == null)
            return response(['message'=>'University details are not found for logged in user'],401);
        $id = $university[0]->university_id;

        $college = DB::select("select id, name from table_college where university_id =".$id);
        return response(['message'=>$college],200);

    }

        public function getCollegeStatistics(){
            $id = Session::get('user_id');
            if($id == null)
                return response(['message'=>'You are not logged in'],401);
            $university = DB::select('select university_id from user_ombudsman where id = '.$id);
            if($university == null)
                return response(['message'=>'University details are not found for logged in user'],401);
            $id = $university[0]->university_id;
            $college_name = DB::select("select table_college.name from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_college on table_college.id = user_student.college_id and table_college.university_id=".$id." 
                            group by table_college.name order by count(*) asc limit 5");

            $college=[];
            $i=0;
            $escalated=[];
            $resolved=[];
            $pending=[];
            foreach ($college_name as $name){
                $college[$i]=$name->name;
                $temp=DB::select("select count(*) as pending from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_college on table_college.id = user_student.college_id
                            where table_college.name ='".$name->name."' and status in ('raised','inaction') and table_college.university_id =".$id);
                $pending[$i]=$temp[0]->pending;
                $temp=DB::select("select count(*) as escalated from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_college on table_college.id = user_student.college_id
                            where table_college.name ='".$name->name."' and status in ('delayed','reopened') and table_college.university_id =".$id);
                $escalated[$i]=$temp[0]->escalated;
                $temp =DB::select("select count(*) as resolved from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_college on table_college.id = user_student.college_id
                            where table_college.name ='".$name->name."' and status in ('addressed','resolved')");
                $resolved[$i++]=$temp[0]->resolved;
            }
            return response(['college'=>$college,'pending'=>$pending,'escalated'=>$escalated,'resolved'=>$resolved],200);
        }

        public function getInstitutewiseDetails($id){

            $students_ = DB::select("Select id from user_student where college_id =".$id);
            $students = [];
            $i=0;
            foreach ($students_ as $s){
                $students[$i++]=$s->id;
            }
            $department = Grievance::whereIn('student_id',$students)->groupBy('type')->get(['type']);

           // $department = DB::select('select g.type from table_grievance g,user_student s where s.college_id = '.$id.' and
                         //   s.college_id=g.student_id group by g.type order by g.type asc');
            if($department == null){
                return response(['message'=>'No data found for the selected institute'],404);
            }

            $departments = [];
            $raised = [];
            $inaction=[];
            $addressed=[];
            $reopened=[];
            $delayed=[];
            $i=0;
            foreach ($department as $d){
                $departments[$i]=$d->type;

                $temp = DB::select('select count(*) as count from table_grievance g,user_student s where s.id = g.student_id
                        and s.college_id = '.$id.' and g.type = '."'".$departments[$i]."'".' and g.status = "raised" group by g.type
                        order by g.type asc');
                if($temp == null){
                    $temp = 0;
                $raised[$i] = $temp;}
                else
                    $raised[$i]=$temp[0]->count;

                $temp = DB::select('select count(*) as count from table_grievance g,user_student s where s.id = g.student_id
                        and s.college_id = '.$id.' and g.type = '."'".$departments[$i]."'".' and g.status = "inaction" group by
                         g.type order by g.type asc');
                if($temp == null){
                    $temp = 0;
                    $inaction[$i] = $temp;}
                else
                    $inaction[$i]=$temp[0]->count;

                $temp = DB::select('select count(*) as count from table_grievance g,user_student s where s.id = g.student_id
                        and s.college_id = '.$id.' and g.type = '."'".$departments[$i]."'".' and g.status in ("addressed","resolved")
                         group by g.type order by g.type asc');
                if($temp == null){
                    $temp = 0;
                    $addressed[$i] = $temp;}
                else
                    $addressed[$i]=$temp[0]->count;

                $temp = DB::select('select count(*) as count from table_grievance g,user_student s where s.id = g.student_id
                        and s.college_id = '.$id.' and g.type = '."'".$departments[$i]."'".' and g.status = "reopened" group by g.type
                         order by g.type asc');
                if($temp == null){
                    $temp = 0;
                    $reopened[$i] = $temp;}
                else
                    $reopened[$i]=$temp[0]->count;

                $temp = DB::select('select count(*) as count from table_grievance g,user_student s where s.id = g.student_id
                        and s.college_id = '.$id.' and g.type = '."'".$departments[$i]."'".' and g.status = "delayed" group by g.type
                         order by g.type asc');
                if($temp == null){
                    $temp = 0;
                    $delayed[$i] = $temp;}
                else
                    $delayed[$i]=$temp[0]->count;
                $i++;
            }

            $temp_data = new temp_();
            $temp_data->name = 'Raised';
            $temp_data->data = $raised;
            $all_data = [];
            $all_data[0]=$temp_data;

            $temp_data = new temp_();
            $temp_data->name = 'In Action';
            $temp_data->data = $inaction;
            $all_data[1]=$temp_data;

            $temp_data = new temp_();
            $temp_data->name = 'Addressed';
            $temp_data->data = $addressed;
            $all_data[2]=$temp_data;

            $temp_data = new temp_();
            $temp_data->name = 'Re-open';
            $temp_data->data = $reopened;
            $all_data[3]=$temp_data;

            $temp_data = new temp_();
            $temp_data->name = 'Delayed';
            $temp_data->data = $delayed;
            $all_data[4]=$temp_data;

            $data['status']=$departments;
            $data['data']=$all_data;
            return response(['message'=>$data],200);
        }


    public function getGrievanceTypeStatistics(){

        $id = Session::get('user_id');

        if($id == null)
            return response(['message' => 'You are not authorized'], 401);

        $university_id = DB::table('user_ombudsman')->where('id', $id)->get(['university_id'])->first();
        if ($university_id == null)
            return response(['message' => 'No data found for the logged in user'], 404);
        $college = DB::table('table_college')->where('university_id', $university_id->university_id)->get(['id']);

        $college_id = [];
        $i = 0;
        foreach ($college as $c) {
            $college_id[$i++] = $c->id;
        }
        $student = DB::table('user_student')->whereIn('college_id', $college_id)->get(['id']);

        $student_id = [];
        $i = 0;
        foreach ($student as $s) {
            $student_id[$i++] = $s->id;
        }
        $exam = DB::table('table_grievance')->whereIn('student_id',$student_id)->get(['type'])->groupBy('type');


        $data=[];
        $i=0;
        foreach ($exam as $ex){

            $data[$i++]=[
                $ex[0]->type,count($ex)
            ];
        }
        return response([$data],200);
    }

    public function getYearStatistics()
    {
        $id = Session::get('user_id');
        if($id == null)
        return response(['message'=>'You are not logged in'],401);
        $university_id = DB::table('user_ombudsman')->where('id', $id)->get(['university_id'])->first();
        if ($university_id == null)
            return response(['message' => 'No data found for the logged in user'], 404);
        $college = DB::table('table_college')->where('university_id', $university_id->university_id)->get(['id']);
        $college_id = [];
        $i = 0;
        foreach ($college as $c) {
            $college_id[$i++] = $c->id;
        }
        $student = DB::table('user_student')->whereIn('college_id', $college_id)->get(['id']);
        $student_id = [];
        $i = 0;
        foreach ($student as $s) {
            $student_id[$i++] = $s->id;
        }
        $count=[];
        $year=[];
        $date = date('Y');
        for($i=0;$i<5;$i++) {
            $startyear = ($date-$i) . '-01-01 00:00:00';
            $endyear = ($date + 1-$i) . '-01-01 00:00:00';
            $count1 = DB::table('table_grievance')->where('created_at', '<',$endyear)->where('created_at', '>',
             $startyear)->whereIn('student_id',$student_id)->count();
            $count[$i]=$count1;
            $year[$i]=$date-$i;
        }
        return response(['count'=>$count,'year'=>$year],200);
    }



    }

class temp_ {
    public $name;
     public  $data;
}
