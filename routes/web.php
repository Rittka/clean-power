<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/
Route::group( [
    'middleware' => ['web', 'localeSessionRedirect', 'localizationRedirect'],
    'prefix' => LaravelLocalization::setLocale(),], function() {
    Route::get('/','IndexController@index');



    // Route::get('/log-in', 'Auth\LoginController@login' )->name('loginForm');
    // Route::get('/login', function(){
    //     return view('logIn.signIn');
    // } )->name('login');
    // Route::post('/login', 'HomeController@doLogin');
    // Route::get('/logout', 'HomeController@doLogout');
    // ->middleware('auth');
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/login', function(){
    //     return view('auth.login');
    // } )->name('login');
    // Route::post('/login', 'HomeController@doLogin');
    // Route::get('/logout', 'HomeController@doLogout')->middleware('auth');
    // Route::get('/home', 'HomeController@index')->name('home');

Route::get('level/{id}/subjects','TeacherController@getSubjectsOfLevel');
    //StaffController
    Route::get( '/staff', 'StaffController@index' );
    Route::get( '/staff/create', 'StaffController@create' );
    Route::get( '/staff/{staff}', 'StaffController@show' );
    Route::get( '/staff/{staff}/edit', 'StaffController@edit' );
    Route::post( '/staff', 'StaffController@store' );
    Route::patch( '/staff/{staff}', 'StaffController@update' );
    Route::get( '/staff/delete/{id}', 'StaffController@destroy' );
    Route::get( '/staff/{staff}/addPosition', 'StaffController@viewPosition' );
    Route::post( '/new-visit-group', 'StaffController@createVisitGroup' );
    Route::post( '/staff/{staff}/positions', 'StaffController@addPosition' );
    Route::get( '/staff/{id}/signatureStaffPosition', 'StaffController@addStaffSignatureView' );
    Route::post( '/staff/{id}/signatureStaffPosition', 'StaffController@addStaffSignature' );

    Route::post( '/new-visit-group', 'StaffController@createVisitGroup' );
    Route::post( '/staff/{staff}/positions', 'StaffController@addPosition' );
    Route::post( '/staff/getStaffDatatable', ['as' => 'getStaffDatatable.data', 'uses' => 'StaffController@staffDatatable' ] );

    //TeacherController
    Route::get( '/teacher', 'TeacherController@index' );
    Route::get( '/teacher/create', 'TeacherController@create' );
    Route::get( '/teacher/{teacher}', 'TeacherController@show' );
    Route::get( '/teacher/{teacher}/edit', 'TeacherController@edit' );
    Route::post( '/teacher', 'TeacherController@store' );
    Route::patch( '/teacher/{teacher}', 'TeacherController@update' );
    Route::delete( '/teacher/{teacher}', 'TeacherController@destroy' );
    Route::post( 'teacher/getTeacherDatatable', [
        'as' => 'getTeacherDatatable.data', 'uses' => 'TeacherController@teacherDatatable' ] );

  //SectionController
    Route::get( '/section', 'SectionController@index' );
    Route::get('/section/create', 'SectionController@create');
    Route::get( '/section/{section}', 'SectionController@show' );
    Route::get( '/section/{section}/edit', 'SectionController@edit' );
    Route::post( '/section', 'SectionController@store' );
    Route::patch( '/section/{section}', 'SectionController@update' );
    Route::delete('/section/{id}', 'SectionController@destroy' );
    Route::get( '/section/{section}/students', 'SectionController@showStudents' );
    Route::patch( '/section/{id}/move', 'SectionController@move' );
    Route::post( '/getStudentSectionDatatable', [ 'as' => 'getStudentSectionDatatable.data', 'uses' => 'SectionController@StudentSectionDtatatable'] );
    Route::get( '/section/{section}/teachers', 'SectionController@showTeachers' );
    Route::post( '/getTeacherSectionDatatable', [ 'as' => 'getTeacherSectionDatatable.data', 'uses' => 'SectionController@TeacherSectionDtatatable'] );

   //SubjectController


  //PersonController
    Route::get( '/person', 'PersonController@index' );
    Route::get( '/person/create', 'PersonController@create' );
    Route::post( '/person', 'PersonController@store' );
    Route::get( '/person/{person}', 'PersonController@show' );
    Route::get( '/person/{person}/edit', 'PersonController@edit' );
    Route::patch( '/person/{person}', 'PersonController@update' );
    Route::delete( '/person/{id}', 'PersonController@destroy' );
    Route::post( 'person/getPersonDatatable', ['as' => 'getPersonDatatable.data', 'uses' => 'PersonController@PersonDatatable' ] );

    //without auth
        // Route::post( 'student/add-payment', 'PersonController@addPayment' );
    // Route::patch( '/student/edit-payment/{id}', 'PersonController@editPayment' );

    Route::patch('/mark/{id}/edit','PersonController@editMark');
    Route::post( 'section/{id}/add-payment', 'PersonController@addPayment');
    Route::patch( '/student/edit-payment/{id}', 'PersonController@editPayment' );
    Route::get('/section/{id}/add-mark','PersonController@showAddMark');
    Route::post('/getAddStudentMarksDatatable', [  'as' => 'getAddStudentMarksDatatable.data' , 'uses' => 'PersonController@addStudentMarksDatatable' ]);
    Route::get('/section/{id}/add-payment','PersonController@showAddPayment');
    Route::post('/getAddStudentPaymentsDatatable', [  'as' => 'getAddStudentPaymentsDatatable.data' , 'uses' => 'PersonController@addStudentPaymentsDatatable' ]);
    //without auth
    //Route::post('/section/{id}/add-mark','PersonController@addMark');
    Route::delete('/mark/{id}','PersonController@deleteMark');


    Route::post('/section/{id}/add-mark','PersonController@addMark');
    Route::get('/section/{id}/add-absence','PersonController@showAddAbsence');
    Route::post('/getAddStudentAbsencesDatatable', ['as' => 'getAddStudentAbsencesDatatable.data' , 'uses' => 'PersonController@addStudentAbsencesDatatable' ]);
    Route::post('/section/{id}/add-absence','PersonController@addAbsence');
    Route::post('/getStudentMarksDatatable', [ 'as' => 'getStudentMarksDatatable.data' , 'uses' => 'PersonController@studentMarksDatatable' ]);

//SettingController
    Route::get( '/user', 'SettingController@showUsers' );
    Route::get( '/user/create', 'SettingController@create' );
    Route::post( '/user', 'SettingController@store' );
    Route::get( '/user/{user}/edit', 'SettingController@edit' );
    Route::patch( '/user/{user}', 'SettingController@update' );
    Route::post( 'user/getUserDatatable', ['as' => 'getUserDatatable.data', 'uses' => 'SettingController@userDatatable' ] );
    Route::get( '/level', 'SettingController@level' );
    Route::get( '/student/{id}/edit', 'PersonController@edit' );

    Route::post( '/level/getSubjects', [ 'as' => 'getSubjectsOfLevelDatatable.data', 'uses' => 'SettingController@levelSubjectDatatable'] );
    Route::post( '/getLevelDatatable', [ 'as' => 'getLevelDatatable.data', 'uses' => 'SettingController@levelDatatable' ] );
    Route::post( '/getSectionDatatable', [ 'as' => 'getSectionDatatable.data', 'uses' => 'SettingController@SectionDatatable' ] );
    Route::post( '/getreportOfStudenstDatatable', [ 'as' => 'getreportOfStudentsDatatable.data', 'uses' => 'SettingController@reportOfStudentsDatatable' ] );
    Route::get( '/settings/reportOfStudent', 'SettingController@reportOfStudent' );

    Route::post( '/subject/getSubjectDatatable', ['as' => 'getSubjectDatatable.data', 'uses' => 'SettingController@SubjectDatatable' ] );
    //maintenance
    Route::get( '/maintenance', 'MaintenanceController@index' );
    Route::get( '/maintenance/create', 'MaintenanceController@create' );
    Route::get( '/maintenance/{maintenance}', 'MaintenanceController@show' );
    Route::get( '/maintenance/{studmaintenanceent}/edit', 'MaintenanceController@edit' );
    Route::patch( '/maintenance/{maintenance}', 'MaintenanceController@update' );
    Route::delete( '/maintenance/{id}', 'MaintenanceController@destroy' );
    Route::post( 'maintenance/getmaintenanceDatatable', ['as' => 'getmaintenanceDatatable.data', 'uses' => 'maintenanceController@maintenanceDatatable' ] );

//equipment
Route::get( '/equipment', 'EquipmentController@index' );
Route::get( '/equipment/create', 'EquipmentController@create' );
Route::post( '/equipment', 'EquipmentController@store' );
Route::get( '/equipment/{equipment}', 'EquipmentController@show' );
Route::get( '/equipment/{id}/edit', 'EquipmentController@edit' );
Route::get( '/equipment/peron', 'EquipmentController@peron' );
Route::patch( '/equipment/{id}', 'EquipmentController@update' )->name('qeuipment.update');
Route::get( '/equipment/delete/{id}', 'EquipmentController@destroy' );
Route::post( 'equipment/getequipmentDatatable', ['as' => 'getequipmentDatatable.data', 'uses' => 'EquipmentController@equipmentDatatable' ] );
});

