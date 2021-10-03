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

Route::get('level/{id}/subjects','RegionController@getSubjectsOfLevel');
    //StaffController
    Route::get( '/staff', 'StaffController@index' );
    Route::get( '/staff/create', 'StaffController@create' );
    Route::get( '/staff/{id}', 'StaffController@show' );
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

    //RegionController
    Route::get( '/region', 'RegionController@index' );
    Route::get( '/region/create', 'RegionController@create' );
    Route::get( '/region/{region}', 'RegionController@show' );
    Route::get( '/region/{id}/edit', 'RegionController@edit' );
    Route::post( '/region', 'RegionController@store' );
    Route::patch( '/region/{region}', 'RegionController@update' );
    Route::get( '/region/delete/{region}', 'RegionController@destroy' );
    Route::post( 'region/getRegionDatatable', [
        'as' => 'getRegionDatatable.data', 'uses' => 'RegionController@regionDatatable' ] );




  //PersonController
    Route::get( '/person', 'PersonController@index' );
    Route::get( '/person/create', 'PersonController@create' );
    Route::post( '/person', 'PersonController@store' )->name('person.store');
    Route::get( '/person/{person}', 'PersonController@show' );
    Route::get( '/person/{person}/edit', 'PersonController@edit' );
    Route::patch( '/person/{person}', 'PersonController@update' );
    Route::delete( '/person/{id}', 'PersonController@destroy' );
    Route::post( 'person/getPersonDatatable', ['as' => 'getPersonDatatable.data', 'uses' => 'PersonController@PersonDatatable' ] );







    //SettingController
    Route::get( '/settings', 'SettingController@invoice_details' );
    Route::get( '/invoice/edit', 'SettingController@edit' );
    Route::get( '/invoice/show', 'SettingController@show' );
    Route::get( '/user', 'SettingController@showUsers' );
    Route::get( '/user/create', 'SettingController@create' );
    Route::post( '/user', 'SettingController@store' );
    Route::get( '/user/{user}/edit', 'SettingController@edit' );
    Route::patch( '/user/{user}', 'SettingController@update' );
    Route::post( 'user/getUserDatatable', ['as' => 'getUserDatatable.data', 'uses' => 'SettingController@userDatatable' ] );
    Route::get( '/level', 'SettingController@level' );


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
Route::get( '/invoice/create', 'EquipmentController@inv' );

Route::get( '/equipment/create', 'EquipmentController@create' );
Route::post( '/equipment', 'EquipmentController@store' );
Route::get( '/equipment/{equipment}', 'EquipmentController@show' );
Route::get( '/equipment/{id}/edit', 'EquipmentController@edit' );
Route::get( '/equipment/peron', 'EquipmentController@peron' );
Route::patch( '/equipment/{id}', 'EquipmentController@update' )->name('qeuipment.update');
Route::get( '/equipment/delete/{id}', 'EquipmentController@destroy' );
Route::post( 'equipment/getequipmentDatatable', ['as' => 'getequipmentDatatable.data', 'uses' => 'EquipmentController@equipmentDatatable' ] );

//project
Route::get( '/project', 'ProjectController@index' );
Route::post( '/project', 'ProjectController@store' );
Route::get( '/project/create', 'ProjectController@create' );
Route::get( '/project/{project}', 'ProjectController@show' );
Route::get( '/project/peron', 'EquipmentController@peron' );
Route::get( '/project/edit', 'ProjectController@edit' );
Route::patch( '/project/{project}', 'ProjectController@update' );
Route::delete( '/project/{id}', 'ProjectController@destroy' );
Route::post( 'project/getprojectDatatable', ['as' => 'getprojectDatatable.data', 'uses' => 'ProjectController@projectDatatable' ] );
//invoices
Route::get( '/invoice', 'InvoiceController@index' );
Route::get( '/invoice/create', 'InvoiceController@create' );
Route::get( '/invoice/{invoice}', 'InvoiceController@show' );
Route::get( '/invoice/peron', 'InvoiceController@peron' );
Route::get( '/invoice/edit', 'InvoiceController@edit' );
Route::patch( '/invoice/{project}', 'InvoiceController@update' );
Route::delete( '/invoice/{id}', 'InvoiceController@destroy' );
Route::post( 'invoice/getinvoiceDatatable', ['as' => 'getinvoiceDatatable.data', 'uses' => 'InvoiceController@invoiceDatatable' ] );
//report
Route::get( '/report/reportOfCustomer', 'ReportController@reportOfCustomer' )->name('reportOfCustomer');
Route::get( '/report/reportOfinvoice_details', 'ReportController@reportOfinvoice_details' )->name('reportOfinvoice_details');
Route::get( '/report/reportOfproject_numofcustomer', 'ReportController@reportOfproject_numofcustomer' )->name('reportOfproject_numofcustomer');
Route::get( '/report/reportOfSupplier', 'ReportController@reportOfSupplier' )->name('reportOfSupplier');

Route::post( 'report/getreportOfMMDatatable', ['as' => 'getreportOfMMDatatable.data', 'uses' => 'ReportController@MMDatatable' ] );


});

