@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View expenses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">View expenses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="" class="btn btn-primary"> Create report </a>
</p>
           <table class="table table-bordered table-striped" id="expense_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Expense ID</th>
                                                      <th scope="col">Project name</th>
                                                      <th scope="col">Time period start date</th>
                                                      <th scope="col">Time period end date</th>
                                                      <th scope="col">Amount given</th>
                                                      <th scope="col">Amount spent</th>
                                                      <th scope="col">Amount leftover</th>
                                                      <th scope="col">Receiver's name</th>
                                                     
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                  @foreach($expense as $e)
                                                    <tr>
                                                        <td>{{$e->expense_id}}</td>
                                                        <td>{{$e->project_name}}</td>
                                                        <td>{{$e->money_given_start_date}}</td>
                                                        <td>{{$e->money_given_end_date}}</td>
                                                        <td>{{$e->amount_given}}</td>
                                                        <td>{{$e->amount_spent}}</td>
                                                        <td>{{$e->amount_leftover}}</td>
                                                        <td>{{$e->receiver_name}}</td>
                                                        
                                                        </td> 
                                                    @endforeach
</table>
</div>
</div>
    @endsection