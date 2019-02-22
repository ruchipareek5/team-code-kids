<?php

namespace App\Http\Controllers;

use App\Grievance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AicteDashBoardController extends Controller
{

    //Function for Statistics of Dashboard

    public function getStatistics($type){
        if($type=='total'){
            $count = Grievance::all()->count();
            return response(['message'=>$count],200);
        }elseif ( $type=='pending' ){
            $count = Grievance::whereIn('status',['addressed','raised'])->count();
            return response(['message'=>$count],200);
        }elseif ( $type=='escalated' ){
            $count = Grievance::whereIn('status',['delayed','reopened'])->count();
            return response(['message'=>$count],200);
        }elseif ( $type=='resolved' ){
            $count = Grievance::whereIn('status',['resolved'])->count();
            return response(['message'=>$count],200);
        }
        else{
            return response(['message'=>'Invalid type'],404);
        }
    }


    public function getStateStatistics(){
         $states = DB::select("select count(*) as count, table_college.state from table_grievance
                    INNER join user_student on table_grievance.student_id = user_student.id
                    INNER JOIN table_college on table_college.id = user_student.college_id
                      group by table_college.state order by count desc limit 5");
         $max =  count($states);
         $count=[];
         $state=[];
         $i=0;
        foreach ($states as $local_state){
            $count[$i]=$local_state->count;
            $state[$i++]=$local_state->state;
        }


         return response(['state'=>$state,'total'=>$count],200);
         }

         public function getCollegeStatistics(){

            $college_name = DB::select("select table_college.name from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_college on table_college.id = user_student.college_id
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
                            where table_college.name ='".$name->name."' and status in ('raised','addressed')");
                $pending[$i]=$temp[0]->pending;
                $temp=DB::select("select count(*) as escalated from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_college on table_college.id = user_student.college_id
                            where table_college.name ='".$name->name."' and status in ('delayed','reopened')");
                $escalated[$i]=$temp[0]->escalated;
                $temp =DB::select("select count(*) as resolved from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_college on table_college.id = user_student.college_id
                            where table_college.name ='".$name->name."' and status in ('resolved')");
                $resolved[$i++]=$temp[0]->resolved;
            }
            return response(['college'=>$college,'pending'=>$pending,'escalated'=>$escalated,'resolved'=>$resolved],200);
         }


         public function getGrievanceTypeStatistics(){
            $exam = DB::select("select count(*) as count,type from table_grievance group by type");

            $data=[];
            $i=0;
            foreach ($exam as $ex){
                $data[$i++]=[
                  $ex->type,$ex->count
                ];
            }
            return response([$data],200);
         }

         public function getYearStatistics(){
            $date = date('Y');
            $startyear = ($date).'-01-01 00:00:00';
            $endyear = ($date+1).'-01-01 00:00:00';
            $count1 = DB::select("SELECT count(*) as 'year' FROM `table_grievance` WHERE `created_at` < '$endyear' and created_at > '$startyear'");
             $startyear = ($date-1).'-01-01 00:00:00';
             $endyear = ($date).'-01-01 00:00:00';
             $count2 = DB::select("SELECT count(*) as 'year' FROM `table_grievance` WHERE `created_at` < '$endyear' and created_at > '$startyear'");
             $startyear = ($date-2).'-01-01 00:00:00';
             $endyear = ($date-1).'-01-01 00:00:00';
             $count3 = DB::select("SELECT count(*) as 'year' FROM `table_grievance` WHERE `created_at` < '$endyear' and created_at > '$startyear'");
             $startyear = ($date-3).'-01-01 00:00:00';
             $endyear = ($date-2).'-01-01 00:00:00';
             $count4 = DB::select("SELECT count(*) as 'year' FROM `table_grievance` WHERE `created_at` < '$endyear' and created_at > '$startyear'");
             $startyear = ($date-4).'-01-01 00:00:00';
             $endyear = ($date-3).'-01-01 00:00:00';
             $count5 = DB::select("SELECT count(*) as 'year' FROM `table_grievance` WHERE `created_at` < '$endyear' and created_at > '$startyear'");

            return response(['count'=>[$count1[0]->year,$count2[0]->year,$count3[0]->year,$count4[0]->year,$count5[0]->year],'year'=>[$date,$date-1,$date-2,$date-3,$date-4]],200);
         }

         public function getUniversityDetails($id){

            $details = DB::select("select d.id as university_id, d.name as university_name,o.name as ombudsman_name,o.phone as omudsman_contact,
            users.email from table_university d,user_ombudsman o,users where o.user_id = users.id and o.university_id = d.id and d.id =$id");

            if($details == null)
                return response(['message'=>'Sorry no data found for given id '.$id],404);

            $count = DB::select("select count(*) as open_grievances from table_grievance
                            INNER join user_student on table_grievance.student_id = user_student.id
                            INNER JOIN table_university on table_university.id = user_student.university_id
                            where user_student.university_id = $id and status in ('raised','addressed')");
            $details[0]->open_grievances = $count[0]->open_grievances;

             return response(['message'=>$details],200);

         }

    public function getCollegeDetails($id){

        $details = DB::select("select d.id as college_id, d.name as college_name,o.name as pricipal_name,o.phone as principal_contact,
            users.email from table_college d,user_principal o,users where d.id =$id and o.college_id = d.id and o.user_id = users.id ");
        
        if($details == null)
            return response(['message'=>'Sorry no data found for given id '.$id],404);


        $count = DB::select("select count(*) as open_grievances from table_grievance,user_student where user_student.college_id = $id and table_grievance.student_id=user_student.id and status in ('raised','addressed')");
	       
	$details[0]->open_grievances = $count[0]->open_grievances;

        return response(['message'=>$details],200);

    }


}
