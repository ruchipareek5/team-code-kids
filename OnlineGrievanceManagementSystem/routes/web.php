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

Route::middleware('auth.basic')->group(function(){
    
    Route::resource('/grievances', 'grievanceController');
	Route::post('/login','LoginController@checkAuth');
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

    Route::get('/committee/grievances/{type}', 'CommitteeController@grievanceDetails');         //Committee Grievance Page
     Route::post('/committee/takeAction', 'CommitteeController@takeAction');         //Committee take action (raised to inaction)
    Route::post('/committee/sfa', 'CommitteeController@seekForApproval');
    Route::get('/committee/grievanceSearch/{id}', 'CommitteeController@show');                       //Committee Seek For Approval
     Route::post('/committee/markAddressed', 'CommitteeController@markAddressed');                       //Committee Mark Addressed
    Route::post('/user/viewStudent', 'CommitteeController@viewStudent');                   //Committee and principal -->view Student


    Route::get('/grievance/ombudsman/statistics/{type}','OmbudsmanDashboardController@getStatistics');
    Route::get('/grievance/ombudsman/chart/college','OmbudsmanDashboardController@getCollegeStatistics');
    Route::get('/grievance/ombudsman/chart/college/{id}','OmbudsmanDashboardController@getInstitutewiseDetails');


    Route::get('/principal/grievances/{type}', 'PrincipalController@grievanceDetails');         //Principal's grievance page
    Route::get('/principal/chart/statistics/{type}', 'PrincipalController@getStatistics');      //Stats for principal's dashboard
    Route::get('/principal/grievance/{id}', 'PrincipalController@show');                        //Principal grievance search
    Route::get('/principal/grievance/committeewise','PrincipalController@getCommitteewiseDetails');

    Route::get('/ombudsman/grievance', 'OmbudsmanController@index');                        //Ombudsman grievance page
    Route::post('/ombudsman/grievanceSearch', 'OmbudsmanController@searchGrievances');      //Ombudsman grievance search

});

Route::get('/principal/chart/status/{type}', 'PrincipalController@committeeStatistics');    //Piechart for grievance types 
Route::get('/principal/chart/type', 'PrincipalController@grievanceTypes');                  //Piechart for grievance status (percentage)

    
Route::get('/grievance/aicte/chart/year','AicteDashBoardController@getYearStatistics');             //for chart using year
Route::get('/grievance/aicte/chart/state','AicteDashBoardController@getStateStatistics');           //for chart using state
Route::get('/grievance/aicte/chart/college','AicteDashBoardController@getCollegeStatistics');       //for chart using college
Route::get('/grievance/aicte/chart/department','AicteDashBoardController@getGrievanceTypeStatistics');      //for chart using department
Route::get('grievance/aicte/importantinfo/university/{id}','AicteDashBoardController@getUniversityDetails');           //For university details
Route::get('grievance/aicte/importantinfo/institute/{id}','AicteDashBoardController@getCollegeDetails');
Route::get('/grievance/download/documents/{path}','grievanceController@download');     //Document Download request
Route::get('/grievance/ombudsman/chart/department','OmbudsmanDashboardController@getGrievanceTypeStatistics');

Route::get('/ui_gridSample', function(){
    return view('templates/ui_gridSample');
});

