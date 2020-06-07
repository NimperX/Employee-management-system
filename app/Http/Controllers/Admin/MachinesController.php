<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Machine;

class MachinesController extends Controller
{
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
        return view ('admin\machines\create');
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
        $machine->project_id = $request->project_id;
        $machine->project_name = $request->project_name;
        $machine->machine_start_date = $request->machine_start_date;
        $machine->machine_end_date = $request->machine_end_date;
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
         $machine->project_id = $request->project_id;
         $machine->project_name = $request->project_name;
         $machine->machine_start_date = $request->machine_start_date;
         $machine->machine_end_date = $request->machine_end_date;
         $machine->additional_details = $request->additional_details;
 
         $project->save();
         return redirect()->route('admin.machines.index');
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
