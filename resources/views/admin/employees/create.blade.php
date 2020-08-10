@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add Employees</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Add Employees</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin.employees.store')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">NIC number of employee:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="employee_nic">


        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="fnamelbl">First name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="first_name" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="lnamelbl">Last name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="last_name" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Employee type: </label>
        <div class="col-sm-10">
          <select class="form-control" name="employee_type" required>
            <option value="" disabled selected> Choose your option </option>
            @foreach($project_types as $t)
            <option value="{{$t->id}}"> {{$t->project_type_name}} </option>
            @endforeach
          </select>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Employee category: </label>
        <div class="col-sm-10">
          <select class="form-control" name="employee_category" required>
            <option value="" disabled selected> Choose your option </option>
            @foreach($employee_category as $e)
            <option value="{{$e->id}}"> {{$e->employee_category}} </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-10" for="projectnamelbl">Designation(if employee type is other):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="designation" id="designationtxt">

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-10" for="customercontactlbl">Contact number(enter as 94..):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="employee_contact_number" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="emaillbl">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="statuslbl">Availability:</label>
        <label class="radio-inline">
          <input type="radio" name="employee_availability" value="true">Available</label>
        &nbsp &nbsp &nbsp &nbsp
        <label class="radio-inline">
          <input type="radio" name="employee_availability" value="false">Not available</label>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Save">
        <input class="btn btn-secondary float-right" type="reset" value="Reset">
      </div>



  </div>
</div>
@endsection