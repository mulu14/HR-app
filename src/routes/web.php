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

Route::get('/', 'DepartmentsController@index')->name('department.index'); 
Route::post('/department', 'DepartmentsController@store')->name('department.store'); 
Route::get('/department/create', 'DepartmentsController@create')->name('department.create'); 
Route::get('/department/{edit}', 'DepartmentsController@edit')->name('department.edit');
Route::patch('/department/update', 'DepartmentsController@update')->name('department.update');
Route::delete('/department/{destroy}', 'DepartmentsController@destroy')->name('department.destroy'); 
Route::get('/employees/index', 'EmployeesController@index')->name('employee.index');
Route::post('/employees', 'EmployeesController@store')->name('employee.store');
Route::get('/employees/create', 'EmployeesController@create')->name('employee.create');
Route::get('/employees/{employee}/id', 'EmployeesController@edit')->name('employee.edit');
Route::get('/employees/{show}', 'EmployeesController@show')->name('employee.show');
Route::patch('/employees/update', 'EmployeesController@update')->name('employee.update');
Route::delete('/employees/{destroy}', 'EmployeesController@destroy')->name('employee.destroy');

