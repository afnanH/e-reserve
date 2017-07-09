<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
 // header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
 header('Access-Control-Allow-Credentials: true');

use App\User;
use App\District;
use App\Government;
use App\product;
use App\Contractor;
/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('admin/home');
});
Route::get('/Home', function () {
    return view('admin/home');
});

Route::get('/Regest', function () {
    return view('admin/Regest');
});

Route::get('/Welcome', function () {
    return view('admin/welcome');
});


Route::resource('/Owner','OwnerController');
Route::resource('/Owner1','OwneradminController');


Route::post('/Login','LoginController@Login');


Route::get('/OwnerCon','OwnerController@NextPageInRegester');

//Route::any('/showhalldetail/{id}','HallController@showhalldetail');
Route::any('/showhalldetail','HallController@showhalldetail');
Route::group(['middleware' => ['web']], function () {

Route::resource('/Halls','HallController');
Route::post('/changeprice','HallController@changeprice');
Route::post('/changeCapcity','HallController@changeCapcity');
Route::post('/changeDistrict','HallController@changeDistrict');
Route::post('/changeGovernment','HallController@changeGovernment');
Route::post('/changeType','HallController@changeType');
Route::post('/changecont','HallController@changecont');

Route::POST('/GetEvents','HallController@GetEvents');

Route::resource('/ContactUS','ContactUsController');
Route::post('/SendContactUs','ContactUsController@SendContactUs');

Route::post('/changeFacilty','HallController@changeFacilty');

//Places
Route::resource('/PlaceType','PlaceTypeController');
//End Places

//Tools Routes
//Types
Route::resource('/Types','TypesController');
Route::get('/updateTypes','TypesController@updateTypes');
Route::any('/Types/destroy/{id}','TypesController@destroy');
//Facilites Routes
Route::resource('/Facilites','FacilitesController');
Route::get('/updateFacilites','FacilitesController@updateFacilites');
Route::any('/Facilites/destroy/{id}','FacilitesController@destroy');

//Government
Route::resource('/Government','GovernmentController');
Route::get('/updateGovernments','GovernmentController@updateGovernments');
Route::any('/Government/destroy/{id}','GovernmentController@destroy');
Route::get('/showallDistriGovernment/{id}','DistrictsController@showallDistriGovernment');
//District
Route::resource('/Districts','DistrictsController');
Route::get('/updateDistricts','DistrictsController@updateDistricts');
Route::any('/Districts/destroy/{id}','DistrictsController@destroy');
//Place Data
Route::resource('/PlaceData','PlaceController');
//
//Schedule Routes
Route::resource('/Schadule','SchaduleController');

//Route::get('/Schadule/my', 'SchaduleController@my');
Route::get('/create', array('uses' => 'SchaduleController@create', 'as' => 'create'));

Route::POST('/Schadule/store', 'SchaduleController@store');

//End


Route::get('/test', function () {
    return view('test');
});

});
