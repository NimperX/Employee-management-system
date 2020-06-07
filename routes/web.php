<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/admin', 'HomeController@index')->name('home');
//Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/register', 'UserController@show')->name('register');
//Route::post('auth.register', 'RegisterController@create');
//Route::get('/login', 'LoginController@index')->name('login');



//to go to user registration page
//Route::get('/register', 'UserController@show')->name('register');;
//to add new user data to db


//route for projects;each route should have a prefix named admin 
Route::resource('/admin/projects', 'Admin\ProjectController' , ['as'=>'admin']);
//
Route::resource('/admin/employees', 'Admin\EmployeesController', ['as'=>'admin']);
//
Route::resource('/admin/machines', 'Admin\MachinesController', ['as'=>'admin']);
