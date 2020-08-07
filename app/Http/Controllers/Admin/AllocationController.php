<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Project; 
use App\Employee;
use App\Type;
use App\EmployeeCategory;
use App\Allocation;
//use App\Machine;  

class AllocationController extends Controller
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
        $arr['allocation'] = Allocation::all();
        return view('admin.allocation.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //this is similar to edit function in employees controller
    public function create(Request $request, Allocation $allocation)
    {
        $request->employee()->allocation()->create([
            'employee_nic'=>$request->employees_new()->employee_nic,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'employee_type'=>$request->employee_type,
            'employee_category'=>$request->employee_category,
            'designation'=>$request->designation,
            'employee_contact_number'=>$request->employee_contact_number,
            'email'=>$request->email,
            'employee_availability'=>$request->employee_availability
        ]);
        $arr['project_types'] = Type::all();

        $arr['employee_category'] = EmployeeCategory::all();

        $arr['employees'] = Employee::all();

        $arr['allocations'] = Allocation::all();

        return view ('admin.allocation.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function allocation()
    {
        $projects = DB::table('projects')
            ->join('employees','projects.project_id', '=', 'employees.project_id')
            ->join('machines', 'projects.project_id', '=', 'machines.project_id')
            ->select('projects.*', 'employees.first_name', 'employees.last_name', 'employees.designation', 'employees.employee_availability','machines.machine_name')
            ->get();
            return $projects;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
