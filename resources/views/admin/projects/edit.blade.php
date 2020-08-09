@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Projects</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Edit Projects</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin.projects.update',$project->project_id)}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Project Type: </label>
        <div class="col-sm-10">
        <select class="form-control" name="project_type" required value="{{$project->type->id}}">

            <option value="" disabled selected> Choose your option </option>
            @foreach($project_types as $t)
            <option value="{{$t->id}}"  {{$project->type->id == $t->id ? 'selected' : ''}}> {{$t->project_type_name}} </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Project name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="project_name" value="{{$project->project_name}}" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Project location:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="project_location" value="{{$project->project_location}}"
            required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="customernamelbl"> Customer name: </label>
        <div class="col-sm-10">
          <select class="form-control" name="customer_id" required value="{{$project->customer->customer_id}}">
            <option value="" disabled selected> Choose your option </option>
            @foreach($customers as $c)
            <option value="{{$c->customer_id}}" {{$project->customer->customer_id == $c->customer_id ? 'selected' : ''}}> {{$c->company_name}} </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">Start Date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')"
            value="{{$project->project_start_date}}" name="project_start_date" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">Estimated end date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Estimated end date" onfocus="(this.type='date')" onblur="(this.type='text')"
            value="{{$project->estimated_project_end_date}}" name="estimated_project_end_date" required>
        </div>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Save">


      </div>
  </div>
  @endsection