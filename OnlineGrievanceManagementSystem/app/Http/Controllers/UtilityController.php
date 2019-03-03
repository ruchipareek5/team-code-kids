<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Nexmo\Response;

class UtilityController extends Controller
{
    public function fetchCollege(){
        $roles = Session::get('roles');
        $user_id = Session::get('user_id');

        if($roles == 'student'){
            $var = DB::select("SELECT college_id FROM user_student WHERE id =".$user_id);
            $college_name = DB::select("SELECT name FROM table_college WHERE id = ".$var[0]->college_id);

            return response(['message'=> $college_name[0]->name], 200);
        }
        else if($roles == 'committee member'){
            $var = DB::select("SELECT user_principal.college_id FROM user_principal INNER JOIN user_committee_member
            ON user_principal.id = user_committee_member.created_by WHERE user_committee_member.id = ".$user_id);

            $college_name = DB::select("SELECT name FROM table_college WHERE id = ".$var[0]->college_id);

            return response(['message'=> $college_name[0]->name], 200);
        }
        else if($roles == 'principal'){
            $var = DB::select("SELECT college_id FROM user_principal WHERE id = ".$user_id);

            $college_name = DB::select("SELECT name FROM table_college WHERE id = ".$var[0]->college_id);

            return response(['message'=> $college_name[0]->name], 200);
        }
        else if($roles == 'vendor'){
            $var = DB::select("SELECT college_id FROM user_vendor WHERE id = ".$user_id);

            $college_name = DB::select("SELECT name FROM table_college WHERE id = ".$var[0]->college_id);

            return response(['message'=> $college_name[0]->name], 200);
        }
    }

    public function fetchUniversity(){
        $roles = Session::get('roles');
        $user_id = Session::get('user_id');

        if($roles == 'student'){
            $var = DB::select("SELECT university_id FROM user_student WHERE id =".$user_id);
            $university_name = DB::select("SELECT name FROM table_university WHERE id = ".$var[0]->university_id);

            return response(['message'=> $university_name[0]->name], 200);
        }
        else if($roles == 'committee member'){
            $var = DB::select("SELECT user_principal.university_id FROM user_principal INNER JOIN user_committee_member
            ON user_principal.id = user_committee_member.created_by WHERE user_committee_member.id = ".$user_id);

            $university_name = DB::select("SELECT name FROM table_university WHERE id = ".$var[0]->university_id);

            return response(['message'=> $university_name[0]->name], 200);
        }
        else if($roles == 'principal'){
            $var = DB::select("SELECT university_id FROM user_principal WHERE id = ".$user_id);

            $university_name = DB::select("SELECT name FROM table_university WHERE id = ".$var[0]->university_id);

            return response(['message'=> $university_name[0]->name], 200);
        }
        else if($roles == 'ombudsman'){
            $var = DB::select("SELECT university_id FROM user_ombudsman WHERE id = ".$user_id);

            $university_name = DB::select("SELECT name FROM table_university WHERE id = ".$var[0]->university_id);

            return response(['message'=> $university_name[0]->name], 200);

        }
        
    }
}
