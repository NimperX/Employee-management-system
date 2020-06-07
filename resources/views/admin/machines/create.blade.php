@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Machines</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Machines</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">

      <form class="form-horizontal" action="{{route('admin.machines.store')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      
      

                                           <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl"> Machine ID: </label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="machine_id">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Machine type: </label>
                                          <div class="col-sm-10">
                                            <select class="form-control" name="machine_type" id="machine_type_select" required>
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            <option value="Backhoe"> Backhoe </option>
                                      <option value="Wackers"> Wacker </option>
                                      <option value="Welding machine"> Welding machine </option>  
                                      <option value="Other"> Other </option>   
                                               </select>

                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fnamelbl"> Machine name(if machine type is other):</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="machine_name">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="lnamelbl">Model number:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="model_number" required>
                                           
                                          </div>
                                        </div>

                                       

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Machine purchase date: </label>
                                          <div class="col-sm-10">
                                                <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')" name="machine_purchase_date" required>
                                            
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="statuslbl">Machine availability:</label>

                                            <label class="radio-inline">
                                              <input type="radio" name="machine_availability" value="Not available">Available</label>
                                              &nbsp &nbsp &nbsp &nbsp 
                                            <label class="radio-inline">
                                              <input type="radio" name="machine_availability" value="Available">Not available</label>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Project ID:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="project_id">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectnamelbl">Project name:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="project_name">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Work start date: </label>
                                          <div class="col-sm-10">
                                                <input type="text" placeholder="Work start date" onfocus="(this.type='date')" onblur="(this.type='text')" name="work_start_date">
                                                </div>
                                        </div>
                                                <div class="form-group">
                                                <label class="control-label col-sm-2" for="projecttypetxt"> Work end date: </label>
                                          <div class="col-sm-10">
                                                <input type="text" placeholder="Work end date" onfocus="(this.type='date')" onblur="(this.type='text')" name="work_end_date">
                                            
                                         
                                        </div>
                                        </div>


                                        <div class="form-group">
                                        <label class="control-label col-sm-2" for="projectnamelbl">Additional details</label>
                                          <div class="col-sm-10">
                                          <input type="text" class="form-control" name="additional_details">
                                          </div>
                                        </div>
                                          
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div>

               
                                      
</div>
</div>
    @endsection