@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Machine Allocation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Machine Allocation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="" class="btn btn-primary"> Create report </a>
</p>
<div style="overflow-x:auto;">
           <table class="table table-bordered table-striped" id="machine_allocation_table">
                                                  <thead>
                                                    <tr>
                                                    <th scope="col">Machine ID</th>
                                                      <th scope="col">Machine Type</th>
                                                      <th scope="col">Machine name</th>
                                                      <th scope="col">Machine availability</th>
                                                      <th scope="col">Project ID</th>
                                                      <th scope="col">Project name</th>
                                                      <th scope="col">Work start date</th>
                                                      <th scope="col">Work end date</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($machine as $key => $data)
                                                    <tr>
                                                        <td>{{$data->machine_id}}</td>
                                                        <td>{{$data->machine_type}}</td>
                                                        <td>{{$data->machine_name}}</td>
                                                        <td>{{$data->machine_availability}}</td>
                                                        <td>{{$data->project_id}}</td>
                                                        <td>{{$data->project_name}}</td>
                                                        <td>{{$data->work_start_date}}</td>
                                                        <td>{{$data->work_end_date}}</td>
                                                        
                                                        </tr>
                                                        
                                                      
                                                        
                                                    @endforeach
</table>
</div>
</div>
</div>
    @endsection