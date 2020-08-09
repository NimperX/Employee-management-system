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
            <th scope="col">Machine model number</th>
            <th scope="col">Project ID</th>
            <th scope="col">Project details</th>
            <th scope="col">Work start date</th>
            <th scope="col">Estimated work end date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

          @foreach($machines as $data)
          <tr>
            <td>{{$data->machine_id}}</td>
            <td>{{$data->type->machine_type_name}}</td>
            <td>{{$data->machine_name == '' ? '-' : $data->machine_name}}</td>
            <td>{{$data->model_number == '' ? '-' : $data->model_number}}</td>
            <td>{{$data->project->project_id}}</td>
            <td><b>{{$data->project->project_name}}</b><br>{{$data->project->project_location}}</td>
            <td>{{$data->project->project_start_date}}</td>
            <td>{{$data->project->estimated_project_end_date}}</td>
            <td>
              <form class="form-horizontal" action="{{route('admin/machines/{machine_id}/unallocate', $data->machine_id)}}" method="POST">
                <!--input type="hidden" name="_method" value="PUT"-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @method('PUT')
                <div class="form-group">
                  <input type="submit" class="btn btn-danger" value="Unallocate">
                </div>
              </form>
            </td>
          </tr>
          @endforeach
      </table>
    </div>
  </div>
</div>
@endsection