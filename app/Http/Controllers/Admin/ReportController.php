<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use App\Estimate;
use App\Expense;
use App\Http\Controllers\Controller;
use App\Labor;
use App\Project;
use App\Supplier;
use App\Warranty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ReportController extends Controller
{
    private $header = '<h2>SISAARA ENGINEERS (Pvt.) Limited</h2>
    <p>No. 138/S, Kandevihara Mw, Siyambalape South, Siyambalape<br>
    Tel: 011-4017875, 011-2401538, Fax:011-2401807<br>
    Email:sisaaraeng@gmail.com, sisaaraengineers@gmail.com
    <hr>
    <br>';

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function printQuotation(Request $request){
        $content = $this->header;
        $content .= date('d M, Y', Carbon::now()->timestamp).'<br>
        <br>
        <br>
        Dear sir/madam,<br>
        <br></p>
        <center><h3 style="text-decoration:underline">Quotation</h3></center>
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
            </table>
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



    public function printEmpMachAllocation(Request $request){

        if($request->project_id == 'all'){
            $projects = Project::all();
        }else{
            $projects = Project::where('project_id','=',$request->project_id)->get();
        }

        $content = $this->header;
        $content .= '<center><h3 style="text-decoration:underline">Employee & Machine Allocation</h3></center>';
        $pcount = 0;
        foreach($projects as $project){

            if($pcount > 0) $content .= '<div style="page-break-after: always;"></div>';

            $content .= '<table width="50%">
                <tr><th align="left">Project ID</th><td>: '.$project->project_id.'</td></tr>
                <tr><th align="left">Project type</th><td>: '.$project->type->project_type_name.'</td></tr>
                <tr><th align="left">Project</th><td>: '.$project->project_name.'</td></tr>
                <tr><th align="left">Location</th><td>: '.$project->project_location.'</td></tr>
                <tr><th align="left">Project start date</th><td>: '.$project->project_start_date.'</td></tr>
                <tr><th align="left">Estimated end date</th><td>: '.$project->estimated_project_end_date.'</td></tr>
            </table><br>
            <h4 style="text-decoration:underline">Employee allocation</h4>
            <table width="100%" style="border:1px solid #000;">
                <tr style="border:1px solid #000;">
                    <th style="border-right:1px solid #000;">#</th>
                    <th style="border-right:1px solid #000;">Employee name</th>
                    <th style="border-right:1px solid #000;">NIC</th>
                    <th style="border-right:1px solid #000;">Category</th>
                    <th>Contact details</th>
                </tr>';
            $i = 0;
            if($project->employees->count() == 0){
                $content .= '<td align="center" colspan="5" style="border-top:1px solid #000;">No employee allocated for this project</td>';
            }

            foreach($project->employees as $e){
                $i++;
                $content .= '<tr>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$i.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->first_name.' '.$e->last_name.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->employee_nic.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->employeecategory->employee_category.'</td>
                    <td align="center" style="border-top:1px solid #000;">'.$e->employee_contact_number.'<br>'.$e->employee_email.'</td>
                </tr>';
            }

            $content .= '</table><br>
            <h4 style="text-decoration:underline">Machine allocation</h4>
            <table width="100%" style="border:1px solid #000;">
                <tr style="border:1px solid #000;">
                    <th style="border-right:1px solid #000;">#</th>
                    <th style="border-right:1px solid #000;">Machine type</th>
                    <th style="border-right:1px solid #000;">Machine name</th>
                    <th style="border-right:1px solid #000;">Model number</th>
                    <th style="border-right:1px solid #000;">Purchase date</th>
                    <th>Additional details</th>
                </tr>';
            
            $i = 0;
            if($project->machines->count() == 0){
                $content .= '<td align="center" colspan="6" style="border-top:1px solid #000;">No machine allocated for this project</td>';
            }
            foreach($project->machines as $m){
                $i++;
                $content .= '<tr>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$i.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$m->type->machine_type_name.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.($m->machine_name == '' ? '-' : $m->machine_name).'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.($m->model_number == '' ? '-' : $m->model_number).'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$m->machine_purchase_date.'</td>
                    <td align="center" style="border-top:1px solid #000;">'.($m->additional_details == '' ? '-' : $m->additional_details).'</td>
                </tr>';
            }
            $content .= '</table>';
            $pcount++;
        }
        

        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($content);
        return $pdf->stream();
    }


    public function printLaborAllocation(Request $request){

        if($request->project_id == 'all'){
            $projects = Project::all();
        }else{
            $projects = Project::where('project_id','=',$request->project_id)->get();
        }

        $content = $this->header;
        $content .= '<center><h3 style="text-decoration:underline">Labor Allocation</h3></center>';
        $pcount = 0;
        foreach($projects as $project){

            if($pcount > 0) $content .= '<div style="page-break-after: always;"></div>';

            $content .= '<table width="50%">
                <tr><th align="left">Project ID</th><td>: '.$project->project_id.'</td></tr>
                <tr><th align="left">Project type</th><td>: '.$project->type->project_type_name.'</td></tr>
                <tr><th align="left">Project</th><td>: '.$project->project_name.'</td></tr>
                <tr><th align="left">Location</th><td>: '.$project->project_location.'</td></tr>
                <tr><th align="left">Project start date</th><td>: '.$project->project_start_date.'</td></tr>
                <tr><th align="left">Estimated end date</th><td>: '.$project->estimated_project_end_date.'</td></tr>
            </table><br>
            <h4 style="text-decoration:underline">Labor allocation</h4>
            <table width="100%" style="border:1px solid #000;">
                <tr style="border:1px solid #000;">
                    <th style="border-right:1px solid #000;">#</th>
                    <th style="border-right:1px solid #000;">Labor name</th>
                    <th style="border-right:1px solid #000;">NIC</th>
                    <th style="border-right:1px solid #000;">Category</th>
                    <th>Contact details</th>
                </tr>';
            $i = 0;
            if($project->labors->count() == 0){
                $content .= '<td align="center" colspan="5" style="border-top:1px solid #000;">No labor allocated for this project</td>';
            }

            foreach($project->labors as $e){
                $i++;
                $content .= '<tr>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$i.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->first_name.' '.$e->last_name.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->labor_nic.'</td>
                    <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->employeecategory->employee_category.'</td>
                    <td align="center" style="border-top:1px solid #000;">'.$e->labor_contact_number.'<br>'.$e->labor_email.'</td>
                </tr>';
            }

            $content .= '</table>';
            $pcount++;
        }
        

        
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($content);
        return $pdf->stream();
    }



    public function printExpenses(Request $request){
        $project = Project::find($request->project_id);
        //dd($project->expense);
        $content = $this->header;
        $content .= '<center><h3 style="text-decoration:underline">Quotation</h3><center>
            <table width="100%" style="border:1px solid #000;">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Project name</th>
                <th scope="col">Time period start date</th>
                <th scope="col">Time period end date</th>
                <th scope="col">Amount given</th>
                <th scope="col">Description</th>
                <th scope="col">Amount spent</th>
                <th scope="col">Amount leftover</th>
                <th scope="col">Receiver\'s name</th>
                </tr>
            </thead>
            <tbody>';
        $i=0;
        foreach($project->expense as $e){
            $i++;
            $content .= '<tr>
                <td>'.$i.'</td>
                <td>'.$project->project_name.'</td>
                <td>'.($e->money_given_start_date == '' ? '-' : date("d-m-Y", strtotime($e->money_given_start_date))).'</td>
                <td>'.($e->money_given_end_date == '' ? '-' : date("d-m-Y", strtotime($e->money_given_end_date))).'</td>
                <td align="right">'.$e->amount_given.'</td>
                <td align="center">'.($e->description == '' ? '-' : $e->description).'</td>
                <td align="right">'.$e->amount_spent.'</td>
                <td align="right">';
            $total_given = 0;
            $total_spent = 0;
            $j = 0;
            foreach($project->expense as $ex){
                if($j>=$i){
                    break;
                }
                $total_given += $ex->amount_given;
                $total_spent += $ex->amount_spent;
                $j++;
            }
            $content .= number_format(($total_given - $total_spent > 0 ? $total_given - $total_spent : 0),2,'.','').'</td>
                <td align="center">'.($e->given_employee_id != '' ? $e->employee->first_name.' '.$e->employee->last_name : '-').'</td>';
        }

        $content .= '</table>';
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($content);
        return $pdf->stream();
    }



    public function printWarranty(Request $request){
        $warranty = Warranty::find($request->warranty_id);
        $content = $this->header;
        $content .= date('d M, Y', Carbon::now()->timestamp).'<br>
        <br>
        <br>
        Dear sir/madam,<br>
        <br></p>
        <center><h3 style="text-decoration:underline">Warranty for the project '.$warranty->project->project_name.'</h3></center>
        <p>With reference to the above metioned project, we wish do submit the following warranty for the below metioned time period on
        behalf of Sisaara Engineers (Pvt.) Limited.</p>
        <table width="50%">
        <tr><td>Warranty period start date</td><td>: '.$warranty->warranty_start_date.'</td></tr>
        <tr><td>Warranty period start date</td><td>: '.$warranty->warranty_start_date.'</td></tr>
        ';
        if($warranty->machine_hours == ''){
            $content .= '
            <tr><td>Warranty period start date</td><td>: '.$warranty->warranty_start_date.'</td></tr>
            <tr><td>Warranty period end date</td><td>: '.$warranty->warranty_end_date.'</td></tr>
        </table>';
        }else{
            $content .= '<table width="30%">
            <tr><td>Machine hours</td><td>: '.$warranty->machine_hours.' hours</td></tr>';
        }
        
        $content .= '</table>
        <br>'.$warranty->description.'
        <br>
        <br>
        <br>
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



    public function printSuppliers(Request $request){

        if($request->supplier_id == 'all'){
            $suppliers = Supplier::all();
        }else{
            $suppliers = Supplier::where('supplier_id','=',$request->supplier_id)->get();
        }
        
        $content = $this->header;
        $content .= '<center><h3 style="text-decoration:underline">Suppliers</h3><center>
            <table width="100%" style="border:1px solid #000;">
            <thead>
                <tr>
                <th scope="col" style="border-right:1px solid #000;">&nbsp;#&nbsp;</th>
                <th scope="col">Supplier</th>
                <th scope="col">Name & details of contact person</th>
                <th scope="col">Address</th>
                <th scope="col">Additional remarks</th>
                <th scope="col">Labor details</th>
                <th scope="col">Allocated project</th>
                </tr>
            </thead>
            <tbody>';
        $i=0;
        foreach($suppliers as $s){
            $j=0;
            $i++;
            if($s->labor->count() == 0){
                $content .= '<tr>
                        <td style="border-top:1px solid #000;border-right:1px solid #000;">&nbsp;'.$i.'&nbsp;</td>
                        <td style="border-top:1px solid #000;">'.$s->supplier_company_name.'</td>
                        <td style="border-top:1px solid #000;">'.$s->name_of_contact_person.'<br>'.$s->supplier_email.'<br>'.$s->supplier_contact_number.'</td>
                        <td style="border-top:1px solid #000;">'.$s->supplier_address.'</td>
                        <td style="border-top:1px solid #000;">'.$s->additional_remarks.'</td>
                        <td style="border-top:1px solid #000;">&nbsp;-&nbsp;</td>
                        <td style="border-top:1px solid #000;">&nbsp;-&nbsp;</td>
                    </tr>';
            }
            foreach($s->labor as $l){
                if($j==0){
                    $content .= '<tr>
                        <td style="border-top:1px solid #000;border-right:1px solid #000;">&nbsp;'.$i.'&nbsp;</td>
                        <td style="border-top:1px solid #000;">'.$s->supplier_company_name.'</td>
                        <td style="border-top:1px solid #000;">'.$s->name_of_contact_person.'<br>'.$s->supplier_email.'<br>'.$s->supplier_contact_number.'</td>
                        <td style="border-top:1px solid #000;">'.$s->supplier_address.'</td>
                        <td style="border-top:1px solid #000;">'.$s->additional_remarks.'</td>
                        <td style="border-top:1px solid #000;">
                            <strong>'.$l->first_name.' '.$l->last_name.'</strong><br>
                            ('.$l->labor_nic.')<br>
                            '.$l->labor_contact_number.'<br>
                            '.$l->labor_email.'
                        </td>'.($l->project_id != '' ?
                        '<td style="border-top:1px solid #000;">
                            <strong>'.$l->project->project_name.'</strong><br>
                            '.$l->project->project_location.'<br>
                        </td>' : '<td>&nbsp;-&nbsp;</td>').'
                    </tr>';
                }else{
                    $content .= '<tr>
                        <td style="border-right:1px solid #000;"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <strong>'.$l->first_name.' '.$l->last_name.'</strong><br>
                            ('.$l->labor_nic.')<br>
                            '.$l->labor_contact_number.'<br>
                            '.$l->labor_email.'
                        </td>'.($l->project_id != '' ?
                        '<td style="border-top:1px solid #000;">
                            <strong>'.$l->project->project_name.'</strong><br>
                            '.$l->project->project_location.'<br>
                        </td>' : '<td>&nbsp;-&nbsp;</td>').'
                    </tr>';
                }
                $j++;
            }
        }

        $content .= '</table>';


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($content);
        return $pdf->stream();
    }

    public function printCustomers(Request $request){
        
        if($request->customer_id == 'all'){
            $customers = Customer::all();
        }else{
            $customers = Customer::where('customer_id','=',$request->customer_id)->get();
        }
        $content = $this->header;
        $content .= '<center><h3 style="text-decoration:underline">Customers</h3><center>
            <table width="100%" style="border:1px solid #000;">
            <thead>
                <tr>
                <th scope="col" style="border-right:1px solid #000;">&nbsp;#&nbsp;</th>
                <th scope="col">Customer</th>
                <th scope="col">Name of contact person</th>
                <th scope="col">Contact details</th>
                <th scope="col">Address</th>
                <th scope="col">Project details</th>
                <th scope="col">Project type</th>
                </tr>
            </thead>
            <tbody>';
        $i=0;
        foreach($customers as $c){
            $j=0;
            $i++;
            if($c->projects->count() == 0){
                $content .= '<tr>
                    <td style="border-top:1px solid #000;border-right:1px solid #000;">&nbsp;'.$i.'&nbsp;</td>
                    <td style="border-top:1px solid #000;">'.$c->company_name.'</td>
                    <td style="border-top:1px solid #000;">'.$c->name_of_contact_person.'<br>'.$c->designation.'<br>('.$c->nic_of_contact_person.')</td>
                    <td style="border-top:1px solid #000;">'.$c->email.'<br>'.$c->contact_number.'</td>
                    <td style="border-top:1px solid #000;">'.$c->company_address.'</td>
                    <td style="border-top:1px solid #000;">&nbsp;-&nbsp;</td>
                    <td style="border-top:1px solid #000;">&nbsp;-&nbsp;</td>
                </tr>';
            }
            foreach($c->projects as $p){
                if($j==0){
                    $content .= '<tr>
                        <td style="border-top:1px solid #000;border-right:1px solid #000;">&nbsp;'.$i.'&nbsp;</td>
                        <td style="border-top:1px solid #000;">'.$c->company_name.'</td>
                        <td style="border-top:1px solid #000;">'.$c->name_of_contact_person.'<br>'.$c->designation.'<br>('.$c->nic_of_contact_person.')</td>
                        <td style="border-top:1px solid #000;">'.$c->email.'<br>'.$c->contact_number.'</td>
                        <td style="border-top:1px solid #000;">'.$c->company_address.'</td>
                        <td style="border-top:1px solid #000;">
                            <strong>'.$p->project_name.'</strong><br>
                            '.$p->project_location.'
                        </td>
                        <td style="border-top:1px solid #000;">'.$p->type->project_type_name.'</td>
                    </tr>';
                }else{
                    $content .= '<tr>
                        <td style="border-right:1px solid #000;"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="border-top:1px solid #000;">
                            <strong>'.$p->project_name.'</strong><br>
                            '.$p->project_location.'
                        </td>
                        <td>'.$p->type->project_type_name.'</td>
                    </tr>';
                }
                $j++;
            }
        }

        $content .= '</table>';


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($content);
        return $pdf->stream();
    }


    public function printLabors(){
        $labors = Labor::all();

        $content = $this->header;
        $content .= '<center><h3 style="text-decoration:underline">Labors</h3><center>
        <table width="100%" style="border:1px solid #000;">
            <tr style="border:1px solid #000;">
                <th style="border-right:1px solid #000;">#</th>
                <th style="border-right:1px solid #000;">Labor name</th>
                <th style="border-right:1px solid #000;">NIC</th>
                <th style="border-right:1px solid #000;">Category</th>
                <th style="border-right:1px solid #000;">Contact details</th>
                <th>Supplier details</th>
            </tr>';
        $i=0;
        foreach($labors as $e){
            $i++;
            $content .= '<tr>
                <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$i.'</td>
                <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->first_name.' '.$e->last_name.'</td>
                <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->labor_nic.'</td>
                <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->employeecategory->employee_category.'</td>
                <td align="center" style="border-top:1px solid #000;border-right:1px solid #000;">'.$e->labor_contact_number.'<br>'.$e->labor_email.'</td>
                <td align="center" style="border-top:1px solid #000;">
                    <strong>'.$e->supplier->supplier_company_name.'</strong><br>'
                    .$e->supplier->name_of_contact_person.'<br>'
                    .$e->supplier->supplier_contact_number.'<br>'
                    .$e->supplier->supplier_email.'
                </td>
            </tr>';
        }

        $content .= '</table>';


        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($content);
        return $pdf->stream();

    }
}