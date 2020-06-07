@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Machines</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Machines</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="{{route('admin.machines.create')}}" class="btn btn-primary"> Add new machine </a>
</p>
           <table class="table table-bordered table-striped" id="machines_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Machine ID</th>
                                                      <th scope="col">Machine Type</th>
                                                      <th scope="col">Machine name</th>
                                                      <th scope="col">Model number</th>
                                                      <th scope="col">Machine purchase date</th>
                                                      <th scope="col">Machine availability</th>
                                                      <th scope="col">Project id</th>
                                                      <th scope="col">Project name</th>
                                                      <th scope="col">Work start date</th>
                                                      <th scope="col">Work end date</th>
                                                      <th scope="col">Additional details</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($machines as $m)
                                                    <tr>
                                                        <td>{{$m->machine_id}}</td>
                                                        <td>{{$m->machine_type}}</td>
                                                        <td>{{$m->machine_name}}</td>
                                                        <td>{{$m->model_number}}</td>
                                                        <td>{{$m->machine_purchase_date}}</td>
                                                        <td>{{$m->machine_availability}}</td>
                                                        <td>{{$m->project_id}}</td>
                                                        <td>{{$m->project_name}}</td>
                                                        <td><{{$m->machine_start_date}}</td>
                                                        <td>{{$m->machine_end_date}}</td>
                                                        <td>{{$m->additional_details}}</td>
                                                        <td> <a href="{{route('admin.machines.edit', $m->machine_id)}}" class="btn btn-info"> Edit </a>  
                                                    @endforeach
</table>
</div>
</div>
    @endsection