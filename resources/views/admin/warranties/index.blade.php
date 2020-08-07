@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Warranties</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Warranties</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="{{route('admin.warranties.create')}}" class="btn btn-primary"> Add new warranty </a>
</p>

           <table class="table table-bordered table-striped" id="warranties_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Warranty ID</th>
                                                      <th scope="col">Project ID</th>
                                                      <th scope="col">Project name</th>
                                                      <th scope="col">Customer name</th>
                                                      <th scope="col">Warranty start date</th>
                                                      <th scope="col">Warranty end date</th>
                                                      <th scope="col">Number of machine hours</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($warranties as $w)
                                                    <tr>
                                                        <td>{{$w->warranty_id}}</td>
                                                        <td>{{$w->project_id}}</td>
                                                        <td>{{$w->project_name}}</td>
                                                        <td>{{$w->customer_name}}</td>
                                                        <td><{{$w->warranty_start_date}}</td>
                                                        <td>{{$w->warranty_end_date}}</td>
                                                        <td>{{$w->machine_hours}}</td>
                                                        <td> <a href="{{route('admin.warranties.edit', $w->warranty_id)}}" class="btn btn-info"> Edit </a>  
                                                    @endforeach
</table>
</div>
</div>
    @endsection