@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employee Allocation Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Employee Allocation Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">
       
      @foreach($employees as $e)
      <form class="form-horizontal" action="{{route('admin/employees/{employee_nic}/allocationUpdate', $e->employee_nic)}}" method="POST">
      @endforeach
      <!--input type="hidden" name="_method" value="PUT"-->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      
     
      
      <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">NIC number of employee:</label>
                                          <div class="col-sm-10">
                                          @foreach($employees as $e)
                                            <input type="text" class="form-control" name="employee_nic" value="{{$e->employee_nic}}" required>
                                            @endforeach
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fnamelbl">First name:</label>
                                          <div class="col-sm-10">
                                          @foreach($employees as $e)
                                            <input type="text" class="form-control" name="first_name" required value="{{$e->first_name}}">
                                            @endforeach
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="lnamelbl">Last name:</label>
                                          <div class="col-sm-10">
                                          @foreach($employees as $e)
                                            <input type="text" class="form-control" name="last_name" required value="{{$e->last_name}}">
                                            @endforeach
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Employee type: </label>
                                          <div class="col-sm-10">
                                          @foreach($employees as $e)
                                            <select class="form-control" name="employee_type" required value="{{$e->employee_type}}">

                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($project_types as $t)
                                            <option value="{{$t->project_type_name}}" 

                                            @if($t->project_type_name == $e->employee_type)
                                            selected
                                            @endif
                                            > {{$t->project_type_name}} </option> 
                                                
                                               
                                               @endforeach
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>
                                            
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Employee category: </label>
                                          <div class="col-sm-10">
                                          @foreach($employees as $e)
                                            <select class="form-control" name="employee_category" required value="{{$e->employee_category}}">
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($employee_category as $e)
                                            <option value="{{$e->employee_category}}" 

                                            @if($e->employee_category == $e->employee_category)
                                            selected
                                            @endif
                                            > {{$e->employee_category}} </option> 
                                                
                                               
                                               @endforeach
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="control-label col-sm-2" for="projectnamelbl">Designation(if employee type is other)</label>
                                          <div class="col-sm-10">
                                          @foreach($employees as $e)
                                          <input type="text" class="form-control" name="designation" value="{{$e->designation}}">
                                          @endforeach
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="customercontactlbl">Contact number:</label>
                                            <div class="col-sm-10">
                                            @foreach($employees as $e)
                                            <input type="text" class="form-control" name="employee_contact_number" required value="{{$e->employee_contact_number}}">
                                            @endforeach
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="emaillbl">Email:</label>
                                              <div class="col-sm-10">
                                              @foreach($employees as $e)
                                              <input type="email" class="form-control" name="email" value="{{$e->email}}">
                                              @endforeach
                                              </div>
                                            </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="statuslbl">Availability:</label>
                                            @foreach($employees as $e)
                                            <label class="radio-inline">
                                              <input type="radio" name="employee_availability" value="{{$e->employee_availability}}" {{ $e->employee_availability == "Not available" ? 'checked' : '' }}>Not available</label>
                                              &nbsp &nbsp &nbsp &nbsp 
                                            <label class="radio-inline">
                                              <input type="radio" name="employee_availability" value="{{$e->employee_availability}}"{{ $e->employee_availability == "Available" ? 'checked' : '' }}>Available</label>
                                              @endforeach
                                          </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Project ID:</label>
                                            <div class="col-sm-10">
                                            <select class="form-control" name="project_id">
                                           
                                           <option value ="" disabled selected> Choose your option </option> 
                                           @foreach($projects as $p)
                                           <option value="{{$p->project_id}}"> {{$p->project_id}} </option> 
                                               
                                              
                                              @endforeach
                                              </select>
                                         </div>
                                       </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectnamelbl">Project details:</label>
                                              <div class="col-sm-10">
                                              <select class="form-control" name="project_details">
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($projects as $p)
                                            <option value="{{$p->project_id}} {{$p->project_name}} {{$p->project_type}} {{$p->project_location}}"> {{$p->project_id}} - {{$p->project_name}} , {{$p->project_type}} , {{$p->project_location}} </option> 
                                                
                                               
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>

                                       
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div>
                                           
                                            
                                      
</div>
</div>
    @endsection