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
      <a href="{{route('admin.expenses.create')}}" class="btn btn-primary"> Add new money handover </a>
    </p>
    <p>
      <a href="" class="btn btn-success"> Create report </a>
    </p>
    <p>
    <form class="form-horizontal" action="{{route('admin/expenses/expensenew')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="form-row">
          <div class="col-sm-3">
            <label class="control-label col-sm-2" for="lbl">Project:</label>
            <select class="form-control" name="project_id" required>
              <option value="" disabled selected> Choose your option </option>
              @foreach($projects as $p)
              <option value="{{$p->project_id}}">{{$p->project_id}} - {{$p->project_name}} , {{$p->project_location}} ({{$p->customer->company_name}})</option>
              @endforeach
            </select>
          </div>
          <div class="col-sm-3">
            <label class="control-label col-sm-2" for="lbl">Description:</label>
            <input type="text" class="form-control" name="description" required>
          </div>
          <div class="col-sm-3">
            <label class="control-label col-sm-2" for="lbl">Amount:</label>
            <input type="text" class="form-control" name="amount" required>
          </div>
          <div class="col-sm-2">
            <label class="control-label col-sm-2" for="lbl">&nbsp;</label><br>
            <input type="submit" class="btn btn-info" value="Add to expenses">
          </div>
        </div>
    </form>
    </p>
    <table class="table table-bordered table-striped" id="expense_table">
      <thead>
        <tr>
          <th scope="col">Expense ID</th>
          <th scope="col">Project name</th>
          <th scope="col">Time period start date</th>
          <th scope="col">Time period end date</th>
          <th scope="col">Amount given</th>
          <th scope="col">Description</th>
          <th scope="col">Amount spent</th>
          <th scope="col">Amount leftover</th>
          <th scope="col">Receiver's name</th>

          <th> Actions </th>
        </tr>
      </thead>
      <tbody>
        @php
            $i=0;
        @endphp
        @foreach($expenses as $e)
          @php
              $i++;
          @endphp
        <tr>
          <td>{{$e->expense_id}}</td>
          <td>{{$e->project->project_name}}</td>
          <td>{{$e->money_given_start_date == '' ? '-' : $e->money_given_start_date}}</td>
          <td>{{$e->money_given_end_date == '' ? '-' : $e->money_given_end_date}}</td>
          <td>{{$e->amount_given}}</td>
          <td>{{$e->description == '' ? '-' : $e->description }}</td>
          <td>{{$e->amount_spent}}</td>
          <td>
            @php
                $total_given = 0;
                $total_spent = 0;
                $j = 0;
            @endphp
            @foreach($expenses as $ex)
              @if($j>=$i)
                @break
              @endif
              @php
                $total_given += $ex->amount_given;
                $total_spent += $ex->amount_spent;
                $j++;
              @endphp
            @endforeach
            {{number_format($total_given - $total_spent,2,'.','')}}
          </td>
          <td>
            @if($e->given_employee_id != '')
            {{$e->employee->first_name}} {{$e->employee->last_name}}
            @else
            -
            @endif
          </td>
          <td>
            @if($e->given_employee_id != '')
            <div class="btn-group" role="group">
              <a href="{{route('admin.expenses.edit', $e->expense_id)}}" class="btn btn-info"> Edit </a>
              {{-- <a href="{{url('/admin/expenses/expenseview')}}" class="btn btn-warning"> View </a> --}}
            </div>
            @endif
          </td>
          @endforeach
    </table>
  </div>
</div>
@endsection