@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Expenses</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Expenses</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <p>
      <a href="{{route('admin.expenses.create')}}" class="btn btn-primary"> Add a new expense </a>
    </p>
    <p>
      <a href="" class="btn btn-success"> Create report </a>
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

        @foreach($expenses as $e)
        <tr>
          <td>{{$e->expense_id}}</td>
          <td>{{$e->project->project_name}}</td>
          <td>{{$e->money_given_start_date}}</td>
          <td>{{$e->money_given_end_date}}</td>
          <td>{{$e->amount_given}}</td>
          <td>{{$e->amount_spent}}</td>
          <td>{{number_format($e->amount_given - $e->amount_spent,2,'.','')}}</td>
          <td>{{$e->employee->first_name}} {{$e->employee->last_name}}</td>
          <td>
            <div class="btn-group" role="group">
              <a href="{{route('admin.expenses.edit', $e->expense_id)}}" class="btn btn-info"> Edit </a>
              {{-- <a href="{{url('/admin/expenses/expenseview')}}" class="btn btn-warning"> View </a> --}}
            </div>
          </td>
          @endforeach
    </table>
  </div>
</div>
@endsection