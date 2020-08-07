@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Machines</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Edit Machines</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin.machines.update',$machine->machine_id)}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')



      <div class="form-group">
        <label class="control-label col-sm-2" for="empniclbl"> Machine ID: </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="machine_id" value="{{$machine->machine_id}}">

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Machine type: </label>
        <div class="col-sm-10">
          <select class="form-control" name="machine_type_id" value="{{$machine->type->id}}">
            @foreach($machine_types as $t)
            <option value="{{$t->id}}" {{$t->id == $machine->type->id ? 'selected' : ''}}> {{$t->machine_type_name}} </option>


            @endforeach
          </select>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="fnamelbl"> Machine name(if machine type is other):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="machine_name" value="{{$machine->machine_name}}">

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="lnamelbl">Model number:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="model_number" value="{{$machine->model_number}}" required>

        </div>
      </div>



      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Machine purchase date: </label>
        <div class="col-sm-10">
          <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')"
            name="machine_purchase_date" value="{{$machine->machine_purchase_date}}" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="statuslbl">Machine availability:</label>

        <label class="radio-inline">
          <input type="radio" name="machine_availability" value="true"
            {{ $machine->machine_availability == 1 ? 'checked' : '' }}>Available</label>
        &nbsp &nbsp &nbsp &nbsp
        <label class="radio-inline">
          <input type="radio" name="machine_availability" value="false"
            {{ $machine->machine_availability == 0 ? 'checked' : '' }}> Not available</label>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Additional details</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="additional_details" value="{{$machine->additional_details}}">
        </div>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Update">
        <input class="btn btn-secondary float-right" type="reset" value="Reset">
      </div>



  </div>
</div>
@endsection