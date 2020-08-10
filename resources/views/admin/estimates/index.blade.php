@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Quotations</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Estimates</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <p>
      <a href="{{route('admin.estimates.create')}}" class="btn btn-primary"> Add new quotation </a>
    </p>

    <table class="table table-bordered table-striped" id="estimates_table">
      <thead>
        <tr>
          <th scope="col">Quotation ID</th>
          <th scope="col">No. of days worked by internal workers</th>
          <th scope="col">Total cost per internal workers</th>
          <th scope="col">No. of days worked by external workers</th>
          <th scope="col">Total cost per external workers</th>
          <th scope="col">No. of days worked by internal machines</th>
          <th scope="col">Total cost per internal machines</th>

          <th scope="col">Total variable cost</th>
          <th scope="col">Overhead rate</th>
          <th scope="col">Variable overhead cost</th>
          <th scope="col">NBT rate</th>
          <th scope="col">VAT rate</th>
          <th scope="col">Profit</th>
          <th scope="col">Total cost charged from customer</th>

          <th> Actions </th>
        </tr>
      </thead>
      <tbody>

      @foreach($estimates as $e)
        <tr>
          <td>{{$e->estimate_id}}</td>
          <td>{{$e->int_work_days}}</td>
          <td>{{$e->int_labor_cost}}</td>
          <td>{{$e->hire_work_days}}</td>
          <td>{{$e->ext_labor_cost}}</td>
          <td>{{$e->machine_work_days}}</td>
          <td>{{$e->machine_cost}}</td>
          <td>
            @php
              $variable_cost = $e->int_labor_cost + $e->ext_labor_cost + $e->machine_cost;
              echo number_format($variable_cost,2,'.','');
            @endphp
          </td>
          <td>{{$e->oh_rate}}%</td>

          <td>
            @php
              $variable_oh_cost = $variable_cost * (1 + $e->oh_rate/100);
              echo number_format($variable_oh_cost,2,'.','');
            @endphp
          </td>
          <td>{{$e->nbt_rate}}%</td>
          <td>{{$e->vat_rate}}%</td>
          <td>{{$e->profit}}%</td>
          <td>
            @php
              $cost_to_be_charged = (($variable_oh_cost * (1 + $e->nbt_rate/100)) * (1 + $e->vat_rate/100)) * (1 + $e->profit/100);
              echo number_format($cost_to_be_charged,2,'.','');
            @endphp
          </td>
          <td>
            <form action="{{route('admin.print.report')}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="type" value="quotation">
              <input type="hidden" name="estimate_id" value="{{$e->estimate_id}}">
              <input type="submit" class="btn btn-success" value="Print">
            </form>
          </td>
            @endforeach
    </table>
  </div>
</div>
@endsection