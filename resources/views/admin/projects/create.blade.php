@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add Projects</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Add Projects</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin.projects.store')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Project Type: </label>
        <div class="col-sm-10">
          <select class="form-control" name="project_type" required>
            <option value="" disabled selected> Choose your option </option>
            @foreach($project_types as $t)
            <option value="{{$t->id}}"> {{$t->project_type_name}} </option>
            @endforeach
          </select>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Project name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="project_name" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Project location:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="project_location" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="customernamelbl"> Customer name: </label>
        <div class="col-sm-10">
          <select class="form-control" name="customer_id" required>
            <option value="" disabled selected> Choose your option </option>
            @foreach($customers as $c)
            <option value="{{$c->customer_id}}"> {{$c->company_name}} </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">Start Date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')"
            name="project_start_date" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">Estimated end date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Estimated end date" onfocus="(this.type='date')" onblur="(this.type='text')"
            name="estimated_project_end_date" required>
        </div>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Save">
        <input class="btn btn-secondary float-right" type="reset" value="Reset">
      </div>


  </div>
</div>

@endsection