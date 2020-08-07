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
        
        $machine->machine_id  = $request->machine_id;
        $machine->machine_type = $request->machine_type;
        $machine->machine_name = $request->machine_name;
        $machine->model_number = $request->model_number;
        $machine->machine_purchase_date = $request->machine_purchase_date;
        $machine->machine_availability = $request->machine_availability;
        $machine->additional_details = $request->additional_details;

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
    public function update(Request $request, Machine $machine)
    {
         //the entire entry in the db is represented
         $machine->machine_id  = $request->machine_id;
         $machine->machine_type = $request->machine_type;
         $machine->machine_name = $request->machine_name;
         $machine->model_number = $request->model_number;
         $machine->machine_purchase_date = $request->machine_purchase_date;
         $machine->machine_availability = $request->machine_availability;
         $machine->additional_details = $request->additional_details;
 
         $project->save();
         return redirect()->route('admin.machines.index');
    }

    public function allocationEdit(Machine $machine)
    {
         //to edit data
        //the value from db is stored inside this object and passed through the url to the view
        
        $arr['machine_types'] = MachineType::all();

        $arr['machines'] = Machine::all();

        $arr['projects'] = Project::all();
        
        return view('admin.machines.allocationview')->with($arr);    
    }

    public function allocationUpdate(Request $request, $machine_id)
    {
         //the entire entry in the db is represented
         $machine = Machine::find($machine_id);
         $machine->machine_id = $request->machine_id;
         $machine->machine_type = $request->machine_type;
         $machine->machine_name= $request->machine_name;
         $machine->machine_availability  = $request->machine_availability;
         $machine->project_id = $request->project_id;
         $machine->project_name = $request->project_name;
         $machine->work_start_date = $request->work_start_date;
         $machine->work_end_date= $request->work_end_date;

         $machine->save();
        return redirect()->route('admin.machines.allocationindex');

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
