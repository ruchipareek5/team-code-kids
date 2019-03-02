<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Support\Facades\Session;
use Illuminate\Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
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


    public function getGrievances($type){

        $id = Session::get('user_id');
        //$id = 1;
        $condition = DB::select("SELECT user_principal.college_id FROM user_committee_member INNER JOIN 
            user_principal ON user_principal.id = user_committee_member.created_by WHERE user_committee_member.id = '".$id."'");

        if($type=='Sent for purchase'){
            $grievance = DB::select("SELECT table_grievance.id, table_grievance.type, table_grievance.description, table_grievance.documents, table_grievance.eta, table_grievance.vendor_status
            FROM table_grievance INNER JOIN user_vendor ON user_vendor.id = table_grievance.vendor_id 
            WHERE user_vendor.college_id = ".$condition[0]->college_id." AND table_grievance.vendor_status = 'Sent for purchase'");
        }
        elseif ($type=='delivered'){
           $grievance = DB::select("SELECT table_grievance.id, table_grievance.type, table_grievance.description, table_grievance.documents, table_grievance.eta, table_grievance.vendor_attachment
            FROM table_grievance INNER JOIN user_vendor ON user_vendor.id = table_grievance.vendor_id 
            WHERE user_vendor.college_id = ".$condition[0]->college_id." AND table_grievance.vendor_status = 'delivered'");
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

     public function deliveryRequest (Request $request){
        $grievance = Grievance::find($request->id);

        if($grievance == null)
            return response(['message'=> 'No such grievance.'], 400);
        $grievance->vendor_status = 'delivered';
        $grievance->save();

        return response(['message'=>'Delivered Successfully'], 200);
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
