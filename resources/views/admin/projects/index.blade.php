@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Projects</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Projects</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <p>
      <a href="{{route('admin.projects.create')}}" class="btn btn-primary"> Add new project </a>
      <form action="{{route('admin.print.empmachproject')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="project_id" value="all">
        <input type="submit" class="btn btn-secondary mb-2" value="View Employee & Machine allocation">
      </form>
      <form action="{{route('admin.print.laborproject')}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="project_id" value="all">
        <input type="submit" class="btn btn-secondary mb-2" value="View Labor allocation">
      </form>
    </p>

    <table class="table table-bordered table-striped" id="projects_table">
      <thead>
        <tr>
          <th scope="col">Project ID</th>
          <th scope="col">Project Type</th>
          <th scope="col">Project name</th>
          <th scope="col">Project location</th>
          <th scope="col">Customer name</th>
          <th scope="col">Contact person</th>
          <th scope="col">Contact number</th>
          <th scope="col">E-mail</th>
          <th scope="col">Project start date</th>
          <th scope="col">Estimated project end date</th>
          <th> Actions </th>
        </tr>
      </thead>
      <tbody>

        @foreach($projects as $p)
        <tr>
          <td>{{$p->project_id}}</td>
          <td>{{$p->type->project_type_name}}</td>
          <td>{{$p->project_name}}</td>
          <td>{{$p->project_location}}</td>
          <td>{{$p->customer->company_name}}</td>
          <td>{{$p->customer->name_of_contact_person}}</td>
          <td>{{$p->customer->contact_number}}</td>
          <td>{{$p->customer->email}}</td>
          <td>{{$p->project_start_date}}</td>
          <td>{{$p->estimated_project_end_date}}</td>
          <td>
            <div class="btn-group" role="group">
              <a href="{{route('admin.projects.edit', $p->project_id)}}" class="btn btn-info mb-2"> Edit </a><br>
              <a href="" class="btn btn-success mb-2"> View </a><br>
            </div>
            <form action="{{route('admin.print.expenses')}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="project_id" value="{{$p->project_id}}">
              <input type="submit" class="btn btn-warning mb-2" value="View Expenses">
            </form>  
            <form action="{{route('admin.print.empmachproject')}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="project_id" value="{{$p->project_id}}">
              <input type="submit" class="btn btn-secondary mb-2" value="View Employee & Machine allocation">
            </form>
            <form action="{{route('admin.print.laborproject')}}" method="POST">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="project_id" value="{{$p->project_id}}">
              <input type="submit" class="btn btn-secondary mb-2" value="View Labor allocation">
            </form>
          </td>
          @endforeach



    </table>
  </div>
</div>
@endsection