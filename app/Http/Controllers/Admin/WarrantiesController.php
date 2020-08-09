<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Warranty;
use App\Project;
use App\Customer;
use Session;

class WarrantiesController extends Controller
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
        $arr['warranties'] = Warranty::all();
        return view('admin.warranties.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['projects'] = Project::all();
        return view('admin.warranties.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warranty = new Warranty();
        $project = Project::find($request->project_id);
        $customer = Customer::find($project->customer_id);

        $warranty->description = $request->description;
        if(($request->warranty_start_date || $request->warranty_end_date) && $request->machine_hours){
            Session::flash('err','You have selected both period and machine hours. Select only one of them.');
            return redirect()->back();
        }
        $warranty->warranty_start_date = $request->warranty_start_date;
        $warranty->warranty_end_date = $request->warranty_end_date;
        $warranty->machine_hours = $request->machine_hours;
        
        $warranty->project()->associate($project);
        $warranty->customer()->associate($customer);

        $warranty->save();
        return redirect()->route('admin.warranties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $arr['warranty'] = Warranty::find($id);

        $arr['projects'] = Project::all();

        return view('admin.warranties.edit')->with($arr);

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
        $warranty = Warranty::find($id);
        $project = Project::find($request->project_id);
        $customer = Customer::find($project->customer_id);

        $warranty->description = $request->description;
        if(($request->warranty_start_date || $request->warranty_end_date) && $request->machine_hours){
            Session::flash('err','You have selected both period and machine hours. Select only one of them.');
            return redirect()->back();
        }
        $warranty->warranty_start_date = $request->warranty_start_date;
        $warranty->warranty_end_date = $request->warranty_end_date;
        $warranty->machine_hours = $request->machine_hours;
        
        $warranty->project()->associate($project);
        $warranty->customer()->associate($customer);

        $warranty->save();
        return redirect()->route('admin.warranties.index');
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
