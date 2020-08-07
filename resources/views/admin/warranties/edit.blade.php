@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Warranties</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Warranties</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">

      <form class="form-horizontal" action="{{route('admin.warranties.update',$warranty->warranty_id)}}"  method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')

      <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Warranty ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="warranty_id" value="{{$warranty->warranty_id}}">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Project ID: </label>
                                          <div class="col-sm-10">
                                            <select class="form-control" name="project_id" required value="{{$warranty->project_id}}">
                                            <option value ="" disabled selected> Choose your option </option> 

                                            @foreach($projects as $p)
                                            <option value="{{$p->project_id}}"

                                            @if($p->project_id == $warranty->project_id)
                                            selected
                                            @endif
                                            > {{$p->project_id}} </option> 
                                                
                                               
                                               @endforeach
                                               </select>
                                            
                                          </div>
                                        </div>
                                        
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projecttypetxt"> Project name: </label>
                                          <div class="col-sm-10">
                                            <select class="form-control" name="project_name" required value="{{$warranty->project_name}}">
                                            <option value ="" disabled selected> Choose your option </option> 

                                            @foreach($projects as $p)
                                            <option value="{{$p->project_id}} {{$p->project_name}}"

                                            @if($p->project_id == $warranty->project_name)
                                            selected
                                            @endif
                                                > {{$p->project_id}} {{$p->project_name}} </option> 
                                                
                                               
                                               @endforeach
                                               </select>
                                            
                                          </div>
                                        </div>

                                          <div class="form-group">
                                          <label class="control-label col-sm-2" for="customernamelbl"> Customer name: </label>
                                          <div class="col-sm-10">
                                          <input type="text" class="form-control" name="customer_name" value="{{$warranty->customer_name}}" required>
                                          </div>
                                        </div>
                                           
                                           <p> Choose either the time period or enter number of machine hours </p>

                                           <div class="form-group">
                                           <label class="control-label col-sm-2" for="emaillbl">Warranty time period:</label>
                                              <div class="col-sm-10">
                                              <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')" name="warranty_start_date" value="{{$warranty->warranty_start_date}}">
                                              <input type="text" placeholder="End date" onfocus="(this.type='date')" onblur="(this.type='text')" name="warranty_end_date" value="{{$warranty->warranty_end_date}}">   
                                              </div>
                                            </div>

                                            <div class="form-group">
                                           <label class="control-label col-sm-2" for="emaillbl">Machine hours:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="machine_hours" value="{{$warranty->machine_hours}}">
                                              </div>
                                            </div>
                                           
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div>
                                            
                                      
</div>
</div>
    @endsection