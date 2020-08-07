@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Expenses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Expenses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
     <!-- /.content-header -->
     <div class="content">
      <div class="container-fluid">

      <!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    </head>
    <body>

      <form class="form-horizontal" action="{{route('admin.expenses.update', $expense->expense_id)}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      
      

                                           <div class="form-group">
                                          <label class="control-label col-sm-2" for="empniclbl">Expense ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="expense_id" required value="{{$expense->expense_id}}">
                                
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="fnamelbl">Project name:</label>
                                          <div class="col-sm-10">
                                          <select class="form-control" name="project_name" value="{{$expense->project_name}}">
                                           
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
                                                <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')" name="money_given_start_date" required value="{{$expense->money_given_start_date}}">  
                                          </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="control-label col-sm-2" for="startdatelbl">Time period end date:</label>
                                              <div class="col-sm-10">
                                                <input type="text" placeholder="End date" onfocus="(this.type='date')" onblur="(this.type='text')" name="money_given_end_date" required value="{{$expense->money_given_end_date}}">  
                                          </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Amount given:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="amount_given" id="amount_given" value="{{$expense->amount_given}}">
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Amount spent:</label>
                                              <div class="col-sm-10">
                                              <input type="text" class="form-control" name="amount_spent" id="amount_spent">
                                              </div>
                                            </div>

                                            <input type="button" onclick="getAmount()" value="Amount left">
                                              
                                            <input readonly id="amount_leftover" name="amount_leftover" value="">


                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Receiver's name:</label>
                                              <div class="col-sm-10">
                                              <select class="form-control" name="receiver_name" value="{{$expense->receiver_name}}">
                                           
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

                                            
                                            <script>
                                            getAmount = function(){
                                              var numVal1 = Number(document.getElementById("amount_given").value);
                                              var numVal2 = Number(document.getElementById("amount_spent").value);
                                              var numLeft = (numVal1 - numVal2)
                                              document.getElementById("amount_leftover").value = numLeft.toFixed(2);
                                                }
                                            </script>                                      
</div>
</div>
    @endsection