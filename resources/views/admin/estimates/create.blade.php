@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Estimates</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Estimates</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">

      
      <script>
                                         function laborCalc(){
                                           var internal_no_of_workers = parseInt(document.getElementById("internal_no_of_workers").value);
                                           var internal_cost_per_worker = parseFloat(document.getElementById("internal_cost_per_worker").value);
                                           var internal_hours_per_day_per_worker = parseInt(document.getElementById("internal_hours_per_day_per_worker").value);
                                           var internal_days_per_worker = parseInt(document.getElementById("internal_days_per_worker").value);

                                           var external_no_of_workers = parseInt(document.getElementById("external_no_of_workers ").value);
                                           var external_cost_per_worker = parseFloat(document.getElementById("external_cost_per_worker").value);
                                           var external_hours_per_day_per_worker = parseInt(document.getElementById("external_hours_per_day_per_worker ").value);
                                           var external_days_per_worker = parseFloat(document.getElementById("external_days_per_worker").value);

                                           var laborCost = ((internal_no_of_workers * internal_cost_per_worker * internal_hours_per_day_per_worker * internal_days_per_worker) + (external_no_of_workers * external_cost_per_worker * external_hours_per_day_per_worker * external_days_per_worker ))
                                           document.getElementById("total_cost_external_worker").value = laborCost;
                                         }
                                         </script>

      <form class="form-horizontal" action="" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      
      

                                           <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Estimate ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="estimate_id" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Project name:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="project_name" required>
                                           
                                          </div>
                                        </div>

                                        <h3> Cost of labor </h3>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Number of internal workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="internal_no_of_workers" name="internal_no_of_workers" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Cost per internal worker</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="internal_cost_per_worker" name="internal_cost_per_worker" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of hours worked by internal workers:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="internal_hours_per_day_per_worker" name="internal_hours_per_day_per_worker" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of days worked by internal workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="internal_days_per_worker" name="internal_days_per_worker" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost per internal workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="total_cost_internal_worker" name="total_cost_internal_worker">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Number of external workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="external_no_of_workers" name="external_no_of_workers" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Cost per external worker</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="external_cost_per_worker" name="external_cost_per_worker" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of hours worked by external workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="external_hours_per_day_per_worker" name="external_hours_per_day_per_worker" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of days worked by external workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="external_days_per_worker" name="external_days_per_worker" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost per external workers</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" id="total_cost_external_worker" name="total_cost_external_worker">
                                            <button id="laborcostcalc" onclick="laborCalc()">Calculate cost of labor</button>


                                           
                                          </div>
                                        </div>

                                       
                                         

                                       

                                        <h3> Cost of machines </h3>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Number of internal machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="internal_no_of_machines" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Cost per internal machine</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="internal_cost_per_machine_hour" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of hours worked by internal machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="internal_hours_per_day_per_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of days worked by internal machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="internal_days_per_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost per internal machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="total_cost_internal_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Number of external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_no_of_machines" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Cost per external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_cost_per_machine_hour" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of hours worked by external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_hours_per_day_per_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">No. of days worked by external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="external_days_per_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost per external machines</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="total_cost_external_machine" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Cost for spare parts</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="spare_part_cost" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total variable cost</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="variable_cost" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Overhead rate</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="overhead_rate" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Variable overhead cost</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="variable_overhead_cost" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">NBT rate</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nbt_rate" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Variable cost and NBT</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="variable_cost_plus_nbt" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">VAT rate</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="vat_rate" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="total_cost" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Profit</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="profit" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Total cost charged from customer:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="cost_charged_from_customer" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div>
                                        

                                        
               
                                      
</div>
</div>
    @endsection