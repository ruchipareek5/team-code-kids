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

Route::post('/register','LoginController@register');

Route::get('/grievance/download/documents/{path}','grievanceController@download');


Route::middleware('auth.basic')->group(function(){
    Route::resource('/grievances', 'grievanceController');
	Route::post('/login','LoginController@checkAuth');
	Route::get('/grievanceSearch/{id}','grievanceController@show');
    Route::get('/grievance/{type}','grievanceController@statistics');
    
    Route::post('/grievances/updateStatus','grievanceController@updateStatus');
    Route::get('/grievance/student/{type}','grievanceController@grievanceDetails');             //For student My grievances data
    Route::get('/grievance/remarks/{id}','grievanceController@getRemarks');
});


Route::get('/ui_gridSample', function(){
    return view('templates/ui_gridSample');
});

