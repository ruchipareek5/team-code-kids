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

class LoginController extends Controller
{
    //
    public function register(Request $request){

        if(!$request->has('name', 'email', 'password', 'role'))
            return cannotProcessData();

      try{
            $pass = Hash::make($request->password);
            User::create(['username'=>$request->name, 'email'=> $request->email, 'password' => $pass, 'roles' => $request->role]);
            return response('registered successfully..',200);
        }
        catch(QueryException $e){
            return cannotProcessData();
        }
    }

     public function checkAuth(){

        $roles = Auth::user()->roles;
        $table_name ='';
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
        $user_id = DB::table($table_name)->where('user_id',Auth::user()->getAuthIdentifier())->get(['id'])->first();
        if($user_id == null){
            return response(['message'=>'No such user'],403);
        }
        Session::put('user_id',$user_id->id);
        Session::put('roles',$roles);
        return response(Auth::user()->roles,200);

    }


}
