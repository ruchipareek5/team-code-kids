<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');

function cannotProcessData(){
	return response("Cannot Process Data",412);
}


Route::get('/', function () {
    return View::make('index');
});


Route::get('/testPartial', function () {
    return view('partials/testPartial');
});

Route::get('/testTemplate', function(){
    return view('templates/testTemplate');
});

Route::post('/register','LoginController@register');        //Registartion page route




// committee dashboard graph
Route::get('/grievance/committee/graph','CommitteeController@getGraphController');
Route::get('/grievance/committee/year','CommitteeController@getYearWiseFiledGrievances');


//AICTE FAQs related routes
Route::group(['middleware'=>'web','prefix'=>'aicte'],function() {

    
    Route::get('/getNumberOfInstitutesAffiliated','FaqController@getNumberOfInstitutesAffiliated'); //To get the total number of affiliated institutes
    Route::get('/getNumberOfGrievanceReported','FaqController@getNumberOfGrievanceReported'); //To get the number of grievances reported
    Route::get('/getNumberOfGrievanceAddressed','FaqController@getNumberOfAddressedGrievance'); //To get the number of grievances addressed
    Route::get('/getNumberOfGrievanceDelayed','FaqController@getNumberOfDelayedGrievance'); //To get the number of delayed grievances
    Route::get('/getNumberOfGrievanceReOpened','FaqController@getNumberOfReOpenedGrievance'); //To get the number of reopened Grievances
    Route::get('/getNumberOfGrievanceInAction','FaqController@getNumberOfInActionGrievance'); //To get the number of In Action Grievances


});


Route::group(['middleware'=>'auth.basic'],function(){
    Route::get('/user/getUserName','LoginController@getUserName');
    Route::resource('/grievances', 'grievanceController');
	Route::post('/login','LoginController@checkAuth');
	Route::get('/logout','LoginController@logout');
    Route::get('/grievance/{type}','grievanceController@statistics');       //For grievance statistics in dashboard
    Route::get('/grievanceSearch/{id}','grievanceController@show');         //For fetching student's my grievance
    Route::post('/grievances/updateStatus','grievanceController@updateStatus');         //For Updating status of grievance from addressed to reopened
    Route::get('/grievance/student/{type}','grievanceController@grievanceDetails');  //For student My grievances data
    Route::post('/grievance/addComment','grievanceController@addRemarks');        //For adding remarks
    Route::get('/grievance/remarks/{id}','grievanceController@getRemarks');        //For fetching remarks student's page

    //For statistics panel
    Route::get('/grievance/aicte/statistics/{type}','AicteDashBoardController@getStatistics');
    Route::get('/aicte/grievances', 'AicteController@index');       //AICTE grievances
    Route::get('/aicte/grievanceSearch', 'AicteController@searchGrievances');       //AICTE Search Grievances
    Route::post('/aicte/addComment', 'AicteController@addComment');         //AICTE Add Comments
    Route::get('/aicte/remarks/{id}', 'AicteController@getRemarks');        //For fetching remarks AICTE's page
    Route::post('/aicte/getCollegeWiseGrievances','AicteController@getAllGrievancesCollegeWise'); //To get all grievances college wise

    Route::post('/aicte/getUniversityWiseGrievances','AicteController@getAllGrievancesUniversityWise'); //To get all grievances university wise

    Route::post('/aicte/getStateWiseGrievances','AicteController@getAllGrievancesStateWise'); //To get all grievances state wise

    Route::get('/user/getUserName','LoginController@getUserName');
    Route::get('/committee/grievances/{type}', 'CommitteeController@grievanceDetails');         //Committee Grievance Page
    Route::get('/committee/statistics/{type}','CommitteeController@getStatistics');
     Route::post('/committee/takeAction', 'CommitteeController@takeAction');         //Committee take action (raised to inaction)
    Route::post('/committee/sfa', 'CommitteeController@seekForApproval');
    Route::get('/committee/grievanceSearch/{id}', 'CommitteeController@show');                       //Committee Seek For Approval
     Route::post('/committee/markAddressed', 'CommitteeController@markAddressed');                       //Committee Mark Addressed
    Route::post('/user/viewStudent', 'CommitteeController@viewStudent');   //Committee and principal -->view Student


    Route::get('/grievance/ombudsman/statistics/{type}','OmbudsmanDashboardController@getStatistics');
    


    Route::get('/principal/grievances/{type}', 'PrincipalController@grievanceDetails');         //Principal's grievance page
    Route::get('/principal/chart/statistics/{type}', 'PrincipalController@getStatistics');      //Stats for principal's dashboard
    Route::get('/principal/grievance/{id}', 'PrincipalController@show');                        //Principal grievance search
    Route::post('/principal/grantApproval', 'PrincipalController@grantApproval');   //Granting Approval Principal
    

    Route::get('/ombudsman/grievance', 'OmbudsmanController@index');                        //Ombudsman grievance page
    Route::post('/ombudsman/grievanceSearch', 'OmbudsmanController@searchGrievances');      //Ombudsman grievance search
    route::get('/ombudsman/college','OmbudsmanDashboardController@getCollegeNameAndId');

    Route::get('/users/fetchCollege', 'UtilityController@fetchCollege');
    Route::get('/users/fetchUniversity', 'UtilityController@fetchUniversity');
});
Route::get('/principal/chart/committeewise','PrincipalController@getCommitteewiseDetails');

Route::get('/principal/chart/status/{type}', 'PrincipalController@committeeStatistics');    //Piechart for grievance types 
Route::get('/principal/chart/type', 'PrincipalController@grievanceTypes');                  //Piechart for grievance status (percentage)
Route::get('/principal/chart/year','PrincipalController@getYearStatistics');
Route::get('/grievance/ombudsman/chart/college','OmbudsmanDashboardController@getCollegeStatistics');
    Route::get('/grievance/ombudsman/chart/college/{id}','OmbudsmanDashboardController@getInstitutewiseDetails');
    
Route::get('/grievance/aicte/chart/year','AicteDashBoardController@getYearStatistics');             //for chart using year
Route::get('/grievance/aicte/chart/state','AicteDashBoardController@getStateStatistics');           //for chart using state
Route::get('/grievance/aicte/chart/college','AicteDashBoardController@getCollegeStatistics');       //for chart using college
Route::get('/grievance/aicte/chart/department','AicteDashBoardController@getGrievanceTypeStatistics');      //for chart using department
Route::get('grievance/aicte/importantinfo/university/{id}','AicteDashBoardController@getUniversityDetails');           //For university details
Route::get('grievance/aicte/importantinfo/institute/{id}','AicteDashBoardController@getCollegeDetails');
Route::get('/grievance/download/documents/{path}','grievanceController@download');     //Document Download request
Route::get('/grievance/ombudsman/chart/department','OmbudsmanDashboardController@getGrievanceTypeStatistics');
Route::get('/grievance/ombudsman/chart/year','OmbudsmanDashboardController@getYearStatistics');


Route::get('/ui_gridSample', function(){
    return view('templates/ui_gridSample');
});


/**
 * This is an open end-point to implement voice related searches
 */

 Route::post('/voiceWebHook','VoiceController@voiceActions');
