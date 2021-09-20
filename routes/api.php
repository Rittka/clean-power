<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/student', function () {
    return view('registration/studentReg');
});
Route::get('/staff/{staff}/addPosition','StaffPositionController@viewPos');
Route::post('/staff/{staff}/positions','StaffPositionController@store');
Route::post('/newVisitGroup','StaffPositionController@createVisitGroup');
Route::patch('/editVisitGroup','StaffPositionController@editVisitGroup');
Route::resource('/student','StudentController');
Route::patch('/student/{id}/edit','StudentController@update');
Route::post('/student/add-payment','StudentController@addPayment');
Route::patch('/student/edit-payment/{id}','StudentController@editPayment');
Route::post('/student/add-absence','StudentController@addAbsence');
Route::patch('/student/edit-absence/{id}','StudentController@editAbsence');
Route::post('/subject/{id}/add-marks','StudentController@addMark');
Route::patch('/student/edit-mark/{id}','StudentController@editMark');
Route::post('/teacher','TeacherController@store');
