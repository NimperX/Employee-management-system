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

    
    public function printReport(Request $request){
        $content = '<h2>SISAARA ENGINEERS (Pvt.) Limited</h2>
        <p>No. 138/S, Kandevihara Mw, Siyambalape South, Siyambalape<br>
        Tel: 011-4017875, 011-2401538, Fax:011-2401807<br>
        Email:sisaaraeng@gmail.com, sisaaraengineers@gmail.com
        <hr>
        <br>
        '.date('d M, Y', Carbon::now()->timestamp).'<br>
        <br>
        <br>
        Dear sir,<br>
        <br></p>
        <center><h3 style="text-decoration:underline">Quotation</h3><center>
        <p>With reference to the discussion, you had with our company, we wish do submit the following quotation</p>

        <table width="100%" style="border:1px solid #000;">
            <tr style="border:1px solid #000;">
                <th>#</th>
                <th>Description</th>
                <th>Count</th>
                <th>Daily rate</th>
                <th>Total</th>
            </tr>';
        $estimation = Estimate::find($request->estimate_id);
        $i=0;
        $emp = true;
        $lab = true;
        $mac = true;
        foreach( $estimation->employeeCategory as $e ){
            if($e->pivot->labor_type == 'e'){
                if($emp){
                    $content .= '<tr><td></td><td colspan="3"><b>Internal labors</b></td></tr>';
                    $emp = false;
                }
                $i++;
                $content .= '<tr>
                    <td>'.$i.'</td>
                    <td>'.$e->employee_category.'</td>
                    <td><center>'.$e->pivot->count.'</center></td>
                    <td>'.number_format($e->pivot->cost,2).'</td>
                    <td>'.number_format($e->pivot->cost*$e->pivot->count,2).'</td></tr>';
            }
        }

        foreach( $estimation->employeeCategory as $e ){
            if($e->pivot->labor_type == 'l'){
                if($lab){
                    $content .= '<tr><td></td><td colspan="3"><b>External labors</b></td></tr>';
                    $lab = false;
                }
                $i++;
                $content .= '<tr>
                    <td>'.$i.'</td>
                    <td>'.$e->employee_category.'</td>
                    <td><center>'.$e->pivot->count.'</center></td>
                    <td>'.number_format($e->pivot->cost,2).'</td>
                    <td>'.number_format($e->pivot->cost*$e->pivot->count,2).'</td></tr>';
            }
        }

        foreach( $estimation->machineType as $e ){
            if($mac){
                $content .= '<tr><td></td><td colspan="3"><b>Machines</b></td></tr>';
                $mac = false;
            }
            $i++;
            $content .= '<tr>
                <td>'.$i.'</td>
                <td>'.$e->machine_type_name.'</td>
                <td><center>'.$e->pivot->count.'</center></td>
                <td>'.number_format($e->pivot->cost,2).'</td>
                <td>'.number_format($e->pivot->cost*$e->pivot->count,2).'</td></tr>';
        }

        $content .= '<tr>
            <td></td>
            <td colspan="3"><b>Total variable cost</b></td>
            <td>'.number_format($estimation->int_labor_cost + $estimation->ext_labor_cost + $estimation->machine_cost,2).'</td></tr>';
        
        $variable_cost = $estimation->int_labor_cost + $estimation->ext_labor_cost + $estimation->machine_cost;
        $variable_oh_cost = $variable_cost * (1 + $estimation->oh_rate/100);
        $cost_to_be_charged = (($variable_oh_cost * (1 + $estimation->nbt_rate/100)) * (1 + $estimation->vat_rate/100)) * (1 + $estimation->profit/100);

        $content .= '<tr>
            <td></td>
            <td colspan="3"><b>Tax + other costs</b></td>
            <td>'.number_format($cost_to_be_charged - $variable_cost,2,'.','').'</td></tr>';
        $content .= '<tr>
            <td colsapn="5"></td></tr><tr>
            <td colsapn="5"></td></tr><tr>
            <td colsapn="5"></td></tr>';
        $content .= '<tr>
            <td></td>
            <td colspan="3"><b>Cost to be charged</b></td>
            <td><b>'.number_format($cost_to_be_charged,2,'.','').'</b></td></tr>';
        $content .= '
            <br>
            <br>
            <p>We trust above quotation is in order and await for your kind approval.<br>
            <br>
            Thanking you<br>
            <br>
            Best regards,<br>
            Sisaara Engineers (Pvt.) Limited
        ';


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($content);
        return $pdf->stream();
    }
}
