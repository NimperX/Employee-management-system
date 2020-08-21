<?php

namespace App\Http\Controllers\Admin;

use App\EmployeeCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Estimate;
use App\MachineType;
use App\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class EstimatesController extends Controller
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
        $arr['estimates'] = Estimate::all();
        return view('admin.estimates.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->get('type');
        $mode = $request->get('mode');

        if($type == 'quotation')
            $arr['quotation'] = true;
        else
            $arr['quotation'] = false;

        if($mode == 'labor'){
            $arr['labor'] = true;
            $arr['machine'] = false;
        }else if($mode == 'machine'){
            $arr['labor'] = false;
            $arr['machine'] = true;
        }else{
            $arr['labor'] = true;
            $arr['machine'] = true;
        }

        $arr['estimates'] = Estimate::all();
        $arr['emp_cats'] = EmployeeCategory::all();
        $arr['emp_types'] = Type::all();
        $arr['machine_types'] = MachineType::all();

        return view('admin.estimates.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->type == 'quotation'){
            $estimate = new Estimate();
            $emp_type = Type::find($request->employee_type);

            $estimate->estimate_type = $request->type;
            $estimate->int_work_days = $request->int_work_days;
            $estimate->hire_work_days = $request->ext_work_days;
            $estimate->machine_work_days = $request->machine_work_days;
            $estimate->int_labor_cost = $request->int_labor_cost;
            $estimate->ext_labor_cost = $request->ext_labor_cost;
            $estimate->machine_cost = $request->machine_cost;
            $estimate->oh_rate = $request->overhead_rate;
            $estimate->nbt_rate = $request->nbt_rate;
            $estimate->vat_rate = $request->vat_rate;
            $estimate->profit = $request->profit;

            $estimate->type()->associate($emp_type);
            $estimate->save();

            for($i=1;$i<=7;$i++){
                if( $request['int_count_'.$i] > 0){
                    $estimate->employeeCategory()->save(EmployeeCategory::find($i), [
                        'labor_type'    => 'e',
                        'count'         => $request['int_count_'.$i],
                        'cost'          => $request['int_charge_'.$i]]);
                }

                if( $request['ext_count_'.$i] > 0){
                    $estimate->employeeCategory()->save(EmployeeCategory::find($i), [
                        'labor_type'    => 'l',
                        'count'         => $request['ext_count_'.$i],
                        'cost'          => $request['ext_charge_'.$i]]);
                }
            }

            for($i=1;$i<=4;$i++){
                if( $request['machine_count_'.$i] > 0){
                    $estimate->machineType()->save(MachineType::find($i), [
                        'count'         => $request['int_count_'.$i],
                        'cost'          => $request['int_charge_'.$i]]);
                }
            }
        }

        return redirect()->route('admin.estimates.index');
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
