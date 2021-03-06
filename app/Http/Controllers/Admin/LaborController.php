<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Labor;
use App\Project; //name of model
use App\Type;
use App\EmployeeCategory;
use App\Supplier;

class LaborController extends Controller
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
        $arr['labor'] = Labor::all();
        return view('admin.labor.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns a form to add a new laborer
        $arr['project_types'] = Type::all();

        $arr['employee_category'] = EmployeeCategory::all();

        $arr['suppliers'] = Supplier::all();

        return view ('admin.labor.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $labor = new Labor();
        $supplier = Supplier::find($request->supplier_id);
        $labor_type = Type::find($request->labor_type);
        $labor_cat = EmployeeCategory::find($request->labor_category);

        $labor->labor_nic = $request->labor_nic;
        $labor->first_name = $request->first_name;
        $labor->last_name = $request->last_name;
        $labor->designation = $request->designation;
        $labor->labor_contact_number = $request->labor_contact_number;
        $labor->labor_email = $request->labor_email;
        if ($request->labor_availability == 'true')
            $labor->labor_availability = 1;
        else
            $labor->labor_availability = 0;
        $labor->labor_hired_date = $request->hired_date;
        $labor->labor_end_date = $request->end_date;

        $labor->supplier()->associate($supplier);
        $labor->type()->associate($labor_type);
        $labor->employeecategory()->associate($labor_cat);
       
        $labor->save();
        return redirect()->route('admin.labor.index');
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
    public function edit(Labor $labor)
    {
        $arr['project_types'] = Type::all();

        $arr['employee_category'] = EmployeeCategory::all();

        $arr['suppliers'] = Supplier::all();
        
        $arr['labor'] = $labor;
        return view('admin.labor.edit')->with($arr);
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
        $labor = Labor::find($id);
        $supplier = Supplier::find($request->supplier_id);
        $labor_type = Type::find($request->labor_type);
        $labor_cat = EmployeeCategory::find($request->labor_category);

        $labor->labor_nic = $request->labor_nic;
        $labor->first_name = $request->first_name;
        $labor->last_name = $request->last_name;
        $labor->designation = $request->designation;
        $labor->labor_contact_number = $request->labor_contact_number;
        $labor->labor_email = $request->labor_email;
        if ($request->labor_availability == 'true')
            $labor->labor_availability = 1;
        else
            $labor->labor_availability = 0;
        $labor->labor_hired_date = $request->hired_date;
        $labor->labor_end_date = $request->end_date;

        $labor->supplier()->associate($supplier);
        $labor->type()->associate($labor_type);
        $labor->employeecategory()->associate($labor_cat);
       
        $labor->save();
        return redirect()->route('admin.labor.index');
    }

    public function allocationEdit($id)
    {
         //to edit data
        //the value from db is stored inside this object and passed through the url to the view
        $arr['projects'] = Project::all();
        $arr['labor'] = Labor::find($id);
        
        return view('admin.labor.allocationview')->with($arr);    
    }

    public function allocationUpdate(Request $request, $id)
    {
         //the entire entry in the db is represented
        $labor = Labor::find($id);
        $project = Project::find($request->project_id);
        
        $labor->labor_availability = 0;
        $labor->project()->associate($project);

        $labor->save();
        return redirect()->route('admin.labor.allocationindex');

    }

    public function unallocate(Request $request, $id)
    {
         //the entire entry in the db is represented
        $labor = Labor::find($id);
        
        $labor->labor_availability = 1;
        $labor->project()->dissociate();

        $labor->save();
        return redirect()->route('admin.labor.allocationindex');

    }

    public function allocationindex()
    {
        $arr['labor'] = Labor::has('project')->get();
        return view('admin.labor.allocationindex')->with($arr);
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
