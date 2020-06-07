<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //displays all data in the projects table in db inside projects view
        //this is passed as an array
        $arr['employees'] = Employee::all();
        return view('admin.employees.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns a form to add a new project
        return view ('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        $employee->employee_nic = $request->employee_nic;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->employee_type = $request->employee_type;
        $employee->employee_category = $request->employee_category;
        $employee->designation = $request->designation;
        $employee->employee_contact_number = $request->employee_contact_number;
        $employee->email = $request->email;
        $employee->employee_availability = $request->employee_availability;
        $employee->project_id = $request->project_id;
        $employee->project_name = $request->project_name;

        $employee->save();
        return redirect()->route('admin.employees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
         //to edit data
        //the value from db is stored inside this object and passed through the url to the view
        //$employee = Employee::find($employee);
        //return view('admin.employees.edit',
        //['employee'=> $employee]);
        $arr['employee'] = $employee;
        return view('admin.employees.edit')->with($arr);

        //return redirect()->route('admin.employees.edit', [$employee->employee_nic]);
        //return view {{route('admin.employees.edit', [$employee->employee_nic])}};

        //return redirect()->route('admin.employees.index');

        //return view('admin.employees.edit')->with($arr);

        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
         //the entire entry in the db is represented
         $employee = Employee::findOrFail($employee_nic);
        $employee->employee_nic = $request->employee_nic;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->employee_type = $request->employee_type;
        $employee->employee_category = $request->employee_category;
        $employee->designation = $request->designation;
        $employee->employee_contact_number = $request->employee_contact_number;
        $employee->email = $request->email;
        $employee->employee_availability = $request->employee_availability;
        $employee->project_id = $request->project_id;
        $employee->project_name = $request->project_name;

        $employee->save();
        return redirect()->route('admin.employees.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
