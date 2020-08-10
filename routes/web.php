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
Route::put('/admin/employees/{employee_nic}/unallocate', 'Admin\EmployeesController@unallocate' , ['as'=>'admin'])->name('admin/employees/{employee_nic}/unallocate');
Route::get('/admin/employees/allocationindex', 'Admin\EmployeesController@allocationindex' , ['as'=>'admin'])->name('admin.employees.allocationindex');


Route::resource('/admin/employees', 'Admin\EmployeesController', ['as'=>'admin']);

//route for machines;each route should have a prefix named admin
Route::get('/admin/machines/{machine_id}/allocationEdit', 'Admin\MachinesController@allocationEdit' , ['as'=>'admin'])->name('admin/machines/{machine_id}/allocationEdit');
Route::put('/admin/machines/{machine_id}/allocationUpdate', 'Admin\MachinesController@allocationUpdate' , ['as'=>'admin'])->name('admin/machines/{machine_id}/allocationUpdate');
Route::put('/admin/machines/{machine_id}/unallocate', 'Admin\MachinesController@unallocate' , ['as'=>'admin'])->name('admin/machines/{machine_id}/unallocate');
Route::get('/admin/machines/allocationindex', 'Admin\MachinesController@allocationindex' , ['as'=>'admin'])->name('admin.machines.allocationindex');
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
Route::post('/admin/expenses/expensenew', 'Admin\ExpensesController@ExpenseNew' , ['as'=>'admin'])->name('admin/expenses/expensenew');
Route::resource('/admin/expenses', 'Admin\ExpensesController', ['as'=>'admin']);
//
Route::resource('/admin/customers', 'Admin\CustomersController', ['as'=>'admin']);

//route for labor
Route::get('/admin/labor/{labor_nic}/allocationEdit', 'Admin\LaborController@allocationEdit' , ['as'=>'admin'])->name('admin/labor/{labor_nic}/allocationEdit');
Route::put('/admin/labor/{labor_nic}/allocationUpdate', 'Admin\LaborController@allocationUpdate' , ['as'=>'admin'])->name('admin/labor/{labor_nic}/allocationUpdate');
Route::put('/admin/labor/{labor_nic}/unallocate', 'Admin\LaborController@unallocate' , ['as'=>'admin'])->name('admin/labor/{labor_nic}/unallocate');
Route::get('/admin/labor/allocationindex', 'Admin\LaborController@allocationindex' , ['as'=>'admin'])->name('admin.labor.allocationindex');
Route::resource('/admin/labor', 'Admin\LaborController', ['as'=>'admin']);
//
Route::get('/admin/timelines/gantt', function () {
    return view('/admin/timelines/gantt');
});

Route::post('/admin/printreport', 'Admin\ProjectController@printReport' , ['as'=>'admin'])->name('admin.print.report');




//Route::get('/admin/join', 'AllocationController@allocation')->name('join');
//Route::get('admin/allocation', 'Admin\AllocationController@index', ['as'=>'admin'])->name('allocation');