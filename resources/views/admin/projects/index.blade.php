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
</p>
           <table class="table table-bordered table-striped" id="projects_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Project ID</th>
                                                      <th scope="col">Project Type</th>
                                                      <th scope="col">Project name</th>
                                                      <th scope="col">Project location</th>
                                                      <th scope="col">Customer name</th>
                                                      <th scope="col">Contact number</th>
                                                      <th scope="col">E-mail</th>
                                                      <th scope="col">Project start date</th>
                                                      <th scope="col">Status</th>
                                                      <th scope="col">Name of senior engineer</th>
                                                      <th scope="col">Name of project supervisor</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($projects as $p)
                                                    <tr>
                                                        <td>{{$p->project_id}}</td>
                                                        <td>{{$p->project_type}}</td>
                                                        <td>{{$p->project_name}}</td>
                                                        <td>{{$p->project_location}}</td>
                                                        <td>{{$p->customer_name}}</td>
                                                        <td>{{$p->contact_number}}</td>
                                                        <td>{{$p->email}}</td>
                                                        <td><{{$p->project_start_date}}</td>
                                                        <td>{{$p->status}}</td>
                                                        <td>{{$p->senior_engineer_name}}</td>
                                                        <td>{{$p->project_supervisor_name}}</td>
                                                        <td> <a href="{{route('admin.projects.edit', $p->project_id)}}" class="btn btn-info"> Edit </a>  
                                                    @endforeach
</table>
</div>
</div>
    @endsection