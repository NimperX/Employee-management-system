@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Labor Allocation Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Labor Allocation Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">
      
      @foreach($labor as $l)
      <form class="form-horizontal" action="{{route('admin/labor/{labor_nic}/allocationUpdate', $l->labor_nic)}}" method="POST">
      @endforeach
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      
                                            
                                          <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Supplier ID: </label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                          <select class="form-control" name="supplier_id" required value="{{$l->supplier_id}}">
                                          <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($suppliers as $s)
                                            <option value="{{$s->supplier_id}}"
                                            @if($s->supplier_id == $l->supplier_id)
                                            selected
                                            @endif
                                            > {{$s->supplier_id}} </option>             
                                               
                                               @endforeach
                                               @endforeach
                                               </select>
                                            
                                          </div>
                                        </div>
                                           
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Supplier details: </label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                          <select class="form-control" name="supplier_details" required value="{{$l->supplier_id}} {{$l->supplier_company_name}}">
                                          <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($suppliers as $s)
                                            <option value="{{$s->supplier_id}} {{$s->supplier_company_name}}"
                                            @if($s->supplier_id == $l->supplier_details)
                                            selected
                                            @endif
                                            > {{$s->supplier_id}} {{$s->supplier_company_name}} </option> 
                                                
                                               @endforeach
                                               @endforeach
                                               </select>
                                            
                                          </div>
                                        </div>

                                           <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">NIC number of laborer:</label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                            <input type="text" class="form-control" name="labor_nic" value="{{$l->labor_nic}}">
                                           @endforeach
                                          
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fnamelbl">First name:</label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                            <input type="text" class="form-control" name="first_name" value="{{$l->first_name}}" required>
                                            @endforeach
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="lnamelbl">Last name:</label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                            <input type="text" class="form-control" name="last_name" value="{{$l->last_name}}" required>
                                           @endforeach
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Laborer type: </label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                          <select class="form-control" name="labor_type" required value="{{$l->labor_type}}">
                                          <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($project_types as $t)
                                            <option value="{{$t->project_type_name}}"
                                            @if($t->project_type_name == $l->labor_type)
                                            selected
                                            @endif
                                            > {{$t->project_type_name}} </option> 
                                                
                                               @endforeach
                                               @endforeach
                                               </select>
                                            
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Laborer category: </label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                            <select class="form-control" name="labor_category" required value="{{$l->labor_category}}">
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($employee_category as $e)
                                            <option value="{{$e->employee_category}}"
                                            @if($e->employee_category == $l->labor_category)
                                            selected
                                            @endif
                                            > {{$e->employee_category}} </option> 
                                                
                                               @endforeach
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="control-label col-sm-10" for="projectnamelbl">Designation(if laborer type is other):</label>
                                          <div class="col-sm-10">
                                          @foreach($labor as $l)
                                          <input type="text" class="form-control" name="designation" value="{{$l->designation}}">
                                          @endforeach
                                         
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-10" for="customercontactlbl">Contact number(enter as 94..):</label>
                                            <div class="col-sm-10">
                                            @foreach($labor as $l)
                                            <input type="text" class="form-control" name="labor_contact_number" required value="{{$l->labor_contact_number}}">
                                            @endforeach

                                            </div>
                                          </div>
                                            

                                          <div class="form-group">
                                          
                                            <label class="control-label col-sm-2" for="statuslbl">Availability:</label>
                                            @foreach($labor as $l)
                                            <label class="radio-inline">
                                              <input type="radio" name="labor_availability" value="{{$l->labor_availability}}" {{ $l->labor_availability == "Not available" ? 'checked' : '' }}>Not available</label>
                                              &nbsp &nbsp &nbsp &nbsp 
                                            <label class="radio-inline">
                                              <input type="radio" name="labor_availability" value="{{$l->labor_availability}}" {{ $l->labor_availability == "Available" ? 'checked' : '' }}>Available</label>
                                              @endforeach
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Project ID:</label>
                                            <div class="col-sm-10">
                                            @foreach($labor as $l)
                                            <select class="form-control" name="project_id">
                                           
                                           <option value ="" disabled selected> Choose your option </option> 
                                           @foreach($projects as $p)
                                           <option value="{{$p->project_id}}"> {{$p->project_id}} </option> 
                                               
                                              @endforeach
                                              @endforeach
                                              </select>
                                         </div>
                                       </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectnamelbl">Project details:</label>
                                              <div class="col-sm-10">
                                              @foreach($labor as $l)
                                              <select class="form-control" name="project_details">
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($projects as $p)
                                            <option value="{{$p->project_id}} {{$p->project_name}} {{$p->project_type}} {{$p->project_location}}"> {{$p->project_id}} - {{$p->project_name}} , {{$p->project_type}} , {{$p->project_location}} </option> 
                                                
                                               @endforeach
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