@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Machine Allocation Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Machine Allocation Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">
       
      @foreach($machines as $m)
      <form class="form-horizontal" action="{{route('admin/machines/{machine_id}/allocationUpdate', $m->machine_id)}}" method="POST">
      @endforeach
      <!--input type="hidden" name="_method" value="PUT"-->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      
     
      
      
      <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl"> Machine ID: </label>
                                          <div class="col-sm-10">
                                          @foreach($machines as $m)
                                            <input type="text" class="form-control" name="machine_id" value="{{$m->machine_id}}">
                                            @endforeach
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Machine type: </label>
                                          <div class="col-sm-10">
                                          @foreach($machines as $m)
                                            <select class="form-control" name="machine_type" required>
                                           
                                           
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($machine_types as $t)
                                            <option value="{{$t->machine_type_name}}" 

                                            @if($t->machine_type_name == $m->machine_type)
                                            selected
                                            @endif
                                            > {{$t->machine_type_name}} </option> 
                                                
                                               
                                               @endforeach
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fnamelbl"> Machine name(if machine type is other):</label>
                                          <div class="col-sm-10">
                                          @foreach($machines as $m)
                                            <input type="text" class="form-control" name="machine_name" value="{{$m->machine_name}}">
                                            @endforeach
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="statuslbl">Machine availability:</label>
                                            @foreach($machines as $m)
                                            <label class="radio-inline">
                                              <input type="radio" name="machine_availability" value="{{$m->machine_availability}}" {{ $m->machine_availability == "Available" ? 'checked' : '' }}>Available</label>
                                              &nbsp &nbsp &nbsp &nbsp 
                                            <label class="radio-inline">
                                              <input type="radio" name="machine_availability" value="{{$m->machine_availability}}" {{ $m->machine_availability == "Not available" ? 'checked' : '' }}>Not available</label>
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
                                            <label class="control-label col-sm-2" for="projectnamelbl">Project name:</label>
                                              <div class="col-sm-10">
                                              <select class="form-control" name="project_name">
                                           
                                           <option value ="" disabled selected> Choose your option </option> 
                                           @foreach($projects as $p)
                                           <option value="{{$p->project_id}} {{$p->project_name}} {{$p->project_type}} {{$p->project_location}}"> {{$p->project_id}} - {{$p->project_name}} , {{$p->project_type}} , {{$p->project_location}} </option> 
                                               
                                              
                                              @endforeach
                                              </select>
                                         </div>
                                       </div>

                                            <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Work start date: </label>
                                          <div class="col-sm-10">
                                          @foreach($machines as $m)
                                                <input type="text" placeholder="Work start date" onfocus="(this.type='date')" onblur="(this.type='text')" name="work_start_date">
                                                @endforeach
                                                </div>
                                        </div>
                                                <div class="form-group">
                                                <label class="control-label col-sm-2" for="projecttypetxt"> Work end date: </label>
                                          <div class="col-sm-10">
                                          @foreach($machines as $m)
                                                <input type="text" placeholder="Work end date" onfocus="(this.type='date')" onblur="(this.type='text')" name="work_end_date">
                                                @endforeach
                                            
                                         
                                        </div>
                                        </div>

                                        
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div>
                                           
                                            
                                      
</div>
</div>
    @endsection