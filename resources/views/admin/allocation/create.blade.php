@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Employee Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Employee Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">

      <form class="form-horizontal" action="" method="POST">
      <!--input type="hidden" name="_method" value="PUT"-->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      
     
      
      <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">NIC number of employee:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="employee_nic" value="{{$allocations->employee_nic}}" required>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fnamelbl">First name:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="first_name" required value="{{$allocations->first_name}}">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="lnamelbl">Last name:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="last_name" required value="{{$allocations->last_name}}">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Employee type: </label>
                                          <div class="col-sm-10">
                                            <select class="form-control" name="employee_type" required value="{{$allocations->employee_type}}">
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($project_types as $t)
                                            <option value="{{$t->project_type_name}}" 

                                            @if($t->project_type_name == $employee->employee_type)
                                            selected
                                            @endif
                                            > {{$t->project_type_name}} </option> 
                                                
                                               
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>
                                            
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Employee category: </label>
                                          <div class="col-sm-10">
                                            <select class="form-control" name="employee_category" required value="{{$employee->employee_category}}">
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($employee_category as $e)
                                            <option value="{{$e->employee_category}}" 

                                            @if($e->employee_category == $employee->employee_category)
                                            selected
                                            @endif
                                            > {{$e->employee_category}} </option> 
                                                
                                               
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="control-label col-sm-2" for="projectnamelbl">Designation(if employee type is other)</label>
                                          <div class="col-sm-10">
                                          <input type="text" class="form-control" name="designation" value="{{$employee->designation}}">
                                         
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="customercontactlbl">Contact number:</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="employee_contact_number" required value="{{$employee->employee_contact_number}}">
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="emaillbl">Email:</label>
                                              <div class="col-sm-10">
                                              <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                                              </div>
                                            </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="statuslbl">Availability:</label>

                                            <label class="radio-inline">
                                              <input type="radio" name="employee_availability" value="{{$employee->employee_availability}}">Not available</label>
                                              &nbsp &nbsp &nbsp &nbsp 
                                            <label class="radio-inline">
                                              <input type="radio" name="employee_availability" value="{{$employee->employee_availability}}">Available</label>
                                          </div>

                            
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Project ID:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="project_id" value="{{$employee->project_id}}">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectnamelbl">Project name:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="project_name" value="{{$employee->project_name}}">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">

                                            <!--div class="buttons">
                                            <input type="submit" class="btn btn-info" value="Edit">
                                            <a href="{{route('admin.employees.show',$employee->employee_nic)}}" type="submit" class="btn btn-info"> Cancel </a>
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div-->
                                            
                                      
</div>
</div>
    @endsection