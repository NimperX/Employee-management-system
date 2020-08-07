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
Route::get('/admin/projects/view', function () {
    return view('/admin/projects/view');
});
Route::resource('/admin/projects', 'Admin\ProjectController' , ['as'=>'admin']);

//route for employees;each route should have a prefix named admin
Route::get('/admin/employees/{employee_nic}/allocationEdit', 'Admin\EmployeesController@allocationEdit' , ['as'=>'admin'])->name('admin/employees/{employee_nic}/allocationEdit');
Route::put('/admin/employees/{employee_nic}/allocationUpdate', 'Admin\EmployeesController@allocationUpdate' , ['as'=>'admin'])->name('admin/employees/{employee_nic}/allocationUpdate');
Route::get('/admin/employees/allocationindex', function () {
    $employee = DB::table('employees_new')->get();
    return view('/admin/employees/allocationindex', ['employee'=> $employee]);
});

Route::resource('/admin/employees', 'Admin\EmployeesController', ['as'=>'admin']);

//route for machines;each route should have a prefix named admin
Route::get('/admin/machines/{machine_id}/allocationEdit', 'Admin\MachinesController@allocationEdit' , ['as'=>'admin'])->name('admin/machines/{machine_id}/allocationEdit');
Route::put('/admin/machines/{machine_id}/allocationUpdate', 'Admin\MachinesController@allocationUpdate' , ['as'=>'admin'])->name('admin/machines/{machine_id}/allocationUpdate');
Route::get('/admin/machines/allocationindex', function () {
    $machine = DB::table('machines')->get();
    return view('/admin/machines/allocationindex', ['machine'=> $machine]);
});
Route::resource('/admin/machines', 'Admin\MachinesController', ['as'=>'admin']);

//route for suppliers;each route should have a prefix named admin
Route::resource('/admin/suppliers', 'Admin\SuppliersController', ['as'=>'admin']);
//

//Route::resource('/admin/allocation', 'Admin\AllocationController', ['as'=>'admin']);

Route::get('/admin/estimates/create2', function () {
    return view('/admin/estimates/create2');
});
Route::resource('/admin/estimates', 'Admin\EstimatesController', ['as'=>'admin']);
//route for warranties
Route::resource('/admin/warranties', 'Admin\WarrantiesController', ['as'=>'admin']);
//route for expenses
Route::get('/admin/expenses/expenseview', 'Admin\ExpensesController@ExpenseView' , ['as'=>'admin'])->name('admin/expenses/expenseview');
Route::resource('/admin/expenses', 'Admin\ExpensesController', ['as'=>'admin']);
//
Route::resource('/admin/customers', 'Admin\CustomersController', ['as'=>'admin']);

//route for labor
Route::get('/admin/labor/{labor_nic}/allocationEdit', 'Admin\LaborController@allocationEdit' , ['as'=>'admin'])->name('admin/labor/{labor_nic}/allocationEdit');
Route::put('/admin/labor/{labor_nic}/allocationUpdate', 'Admin\LaborController@allocationUpdate' , ['as'=>'admin'])->name('admin/labor/{labor_nic}/allocationUpdate');
Route::get('/admin/labor/allocationindex', function () {
    $labor = DB::table('labor')->get();
    return view('/admin/labor/allocationindex', ['labor'=> $labor]);
});
Route::resource('/admin/labor', 'Admin\LaborController', ['as'=>'admin']);
//
Route::get('/admin/timelines/gantt', function () {
    return view('/admin/timelines/gantt');
});




//Route::get('/admin/join', 'AllocationController@allocation')->name('join');
//Route::get('admin/allocation', 'Admin\AllocationController@index', ['as'=>'admin'])->name('allocation');