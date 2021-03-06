@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Employee Allocation</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Employee Allocation</li>
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
      <table class="table table-bordered table-striped" id="employee_allocation_table">
        <thead>
          <tr>
            <th scope="col">NIC number of employee</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Employee type</th>
            <th scope="col">Employee category</th>
            <th scope="col">Designation</th>
            <th scope="col">Employee contact number</th>
            <th scope="col">Email</th>
            <th scope="col">Project ID</th>
            <th scope="col">Project details</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>


          @foreach($employees as $data)
          <tr>
            <td>{{$data->employee_nic}}</td>
            <td>{{$data->first_name}}</td>
            <td>{{$data->last_name}}</td>
            <td>{{$data->type->project_type_name}}</td>
            <td>{{$data->employeecategory->employee_category}}</td>
            <td>{{$data->designation == '' ? '-' : $data->designation}}</td>
            <td>{{$data->employee_contact_number}}</td>
            <td>{{$data->employee_email}}</td>
            <td>{{$data->project->project_id}}</td>
            <td><b>{{$data->project->project_name}}</b><br>{{$data->project->project_location}}</td>
            <td>
              <form class="form-horizontal" action="{{route('admin/employees/{employee_nic}/unallocate', $data->employee_id)}}" method="POST">
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