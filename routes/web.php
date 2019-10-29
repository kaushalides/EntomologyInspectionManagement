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
// main navigations
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/add_inspection', 'InspectionController@returnView');

Route::get('/view_inspection','InspectionController@show')->name('view_inspection');
Route::get('/add_company', function () {
    return view('add_company');
})->name('add_company');
Route::get('/add_employee', function () {
    return view('add_employee');
})->name('add_employee');
// db inserts
Route::post('/addNewCompany','CompanyController@store');
Route::post('/editCompany','CompanyController@edit');

Route::post('/addNewEmployee','EmployeeController@store');
Route::post('/addInspection','InspectionController@store');


//db retrieve  
Route::get('/getEmployees/{id}', 'EmployeeController@getEmployees');
Route::get('/view_company','CompanyController@show')->name('view_company');
Route::get('/view_employee','EmployeeController@show')->name('view_employee');
