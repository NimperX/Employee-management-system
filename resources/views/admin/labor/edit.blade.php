@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Labor Details </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Edit Labor Details</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin.labor.update', $labor->labor_id)}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Supplier details: </label>
        <div class="col-sm-10">
          <select class="form-control" name="supplier_id" required>
            <option value="" disabled selected> Choose your option </option>
            @foreach($suppliers as $s)
            <option value="{{$s->supplier_id}}" {{$labor->supplier->supplier_id == $s->supplier_id ? 'selected' : ''}}>{{$s->supplier_company_name}} </option>
            @endforeach
          </select>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl">NIC number of laborer:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="labor_nic" value="{{$labor->labor_nic}}">


        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="fnamelbl">First name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="first_name" value="{{$labor->first_name}}" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="lnamelbl">Last name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="last_name" value="{{$labor->last_name}}" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Laborer type: </label>
        <div class="col-sm-10">
          <select class="form-control" name="labor_type" required value="{{$labor->type->id}}">
            <option value="" disabled selected> Choose your option </option>
            @foreach($project_types as $t)
            <option value="{{$t->id}}" {{$labor->type->id == $t->id ? 'selected' : ''}}> {{$t->project_type_name}} </option>
            @endforeach
          </select>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Laborer category: </label>
        <div class="col-sm-10">
          <select class="form-control" name="labor_category" required value="{{$labor->employeecategory->id}}">
            <option value="" disabled selected> Choose your option </option>
            @foreach($employee_category as $e)
            <option value="{{$e->id}}" {{$labor->employeecategory->id == $e->id ? 'selected' : ''}}> {{$e->employee_category}} </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-10" for="projectnamelbl">Designation(if laborer type is other):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="designation" value="{{$labor->designation}}">

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-10" for="customercontactlbl">Contact number(enter as 94..):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="labor_contact_number" required
            value="{{$labor->labor_contact_number}}">

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="emaillbl">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="labor_email" required value="{{$labor->labor_email }}">
        </div>
      </div>
      
      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">Hired Date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Hired date" onfocus="(this.type='date')" onblur="(this.type='text')"
            name="hired_date" required value="{{$labor->labor_hired_date}}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">End date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="End date" onfocus="(this.type='date')"
            onblur="(this.type='text')" name="end_date" required value="{{$labor->labor_end_date}}">
        </div>
      </div>

      <div class="form-group">

        <label class="control-label col-sm-2" for="statuslbl">Availability:</label>

        <label class="radio-inline">
          <input type="radio" name="labor_availability" value="true"
            {{ $labor->labor_availability == "1" ? 'checked' : '' }}>Available</label>
        &nbsp &nbsp &nbsp &nbsp
        <label class="radio-inline">
          <input type="radio" name="labor_availability" value="false"
            {{ $labor->labor_availability == "0" ? 'checked' : '' }}>Not available</label>
      </div>



      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Update">
        <input class="btn btn-secondary float-right" type="reset" value="Reset">
      </div>



  </div>
</div>
@endsection