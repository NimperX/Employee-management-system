@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Expenses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Expenses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">

      <form class="form-horizontal" action="{{route('admin.expenses.store')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      
      

                                           <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Expense ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="expense_id" required>
                                
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fnamelbl">Project name:</label>
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
                                              <label class="control-label col-sm-2" for="startdatelbl">Time period start date:</label>
                                              <div class="col-sm-10">
                                                <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')" name="time_period_start_date" required>  
                                          </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="control-label col-sm-2" for="startdatelbl">Time period end date:</label>
                                              <div class="col-sm-10">
                                                <input type="text" placeholder="End date" onfocus="(this.type='date')" onblur="(this.type='text')" name="time_period_end_date" required>  
                                          </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Amount given:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="amount_given" value="">
                                              </div>
                                            </div>
                                            
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Receiver's name:</label>
                                              <div class="col-sm-10">
                                              <select class="form-control" name="receiver_name">
                                           
                                           <option value ="" disabled selected> Choose your option </option> 
                                           @foreach($employees as $e)
                                           <option value="{{$e->first_name}} {{$e->last_name}} {{$e->employee_type}} {{$e->employee_category}}"> {{$e->first_name}} {{$e->last_name}} {{$e->employee_type}} {{$e->employee_category}} </option> 
                                               
                                              
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