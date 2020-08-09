<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Machine;
use App\MachineType;
use App\Project; 

class MachinesController extends Controller
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
        $arr['machines'] = Machine::all();
        return view('admin.machines.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['machine_types'] = MachineType::all();

        return view ('admin\machines\create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Machine $machine)
    {
        $machine = new Machine();
        $machineType = MachineType::find($request->machine_type_id);
        $machine->machine_name = $request->machine_name;
        $machine->model_number = $request->model_number;
        $machine->machine_purchase_date = $request->machine_purchase_date;
        if ($request->machine_availability == 'true')
            $machine->machine_availability = 1;
        else
            $machine->machine_availability = 0;
        $machine->additional_details = $request->additional_details;
        $machine->type()->associate($machineType);
        $machine->save();
        return redirect()->route('admin.machines.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        $arr['machine'] = $machine;

        $arr['machine_types'] = MachineType::all();

        return view('admin.machines.edit')->with($arr);
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
         //the entire entry in the db is represented
        $machine = Machine::find($id);
        $machineType = MachineType::find($request->machine_type_id);
        $machine->machine_name = $request->machine_name;
        $machine->model_number = $request->model_number;
        $machine->machine_purchase_date = $request->machine_purchase_date;
        if ($request->machine_availability == 'true')
            $machine->machine_availability = 1;
        else
            $machine->machine_availability = 0;
        $machine->additional_details = $request->additional_details;
        $machine->type()->associate($machineType);
        $machine->save();
         return redirect()->route('admin.machines.index');
    }

    public function allocationEdit($id)
    {
        $arr['projects'] = Project::all();

        $arr['machine'] = Machine::find($id);
        
        return view('admin.machines.allocationview')->with($arr);    
    }

    public function allocationUpdate(Request $request, $id)
    {
         //the entire entry in the db is represented
        $machine = Machine::find($id);
        $project = Project::find($request->project_id);
        $machine->machine_availability = 0;
        $machine->project()->associate($project);

        $machine->save();
        return redirect()->route('admin.machines.allocationindex');

    }

    public function unallocate(Request $request, $id)
    {
         //the entire entry in the db is represented
        $machine = Machine::find($id);
        
        $machine->machine_availability = 1;
        $machine->project()->dissociate();

        $machine->save();
        return redirect()->route('admin.machines.allocationindex');

    }

    public function allocationindex()
    {
        $arr['machines'] = Machine::has('project')->get();
        return view('admin.machines.allocationindex')->with($arr);
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
