@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Employees</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Employees</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="{{route('admin.employees.create')}}" class="btn btn-primary"> Add new employee </a>             
</p>
<p>
              <a href="{{url('/admin/employees/allocationindex')}}" class="btn btn-success"> View allocation </a>
              </p>
<div style="overflow-x:auto;">
           <table class="table table-bordered table-striped" id="employee_table">
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
                                                      <th scope="col">Availability</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($employees as $e)
                                                    <tr>
                                                        <td>{{$e->employee_nic}}</td>
                                                        <td>{{$e->first_name}}</td>
                                                        <td>{{$e->last_name}}</td>
                                                        <td>{{$e->type->project_type_name}}</td>
                                                        <td>{{$e->employeecategory->employee_category}}</td>
                                                        <td>{{$e->designation == '' ? '-' : $e->designation}}</td>
                                                        <td>{{$e->employee_contact_number}}</td>
                                                        <td>{{$e->employee_email}}</td>
                                                        <td>{{$e->employee_availability == 1 ? 'Available' : 'Not available'}}</td>
                                                        <td> <div class="btn-group" role="group">
                                                        <a href="{{route('admin.employees.edit',$e->employee_id)}}" class="btn btn-info"> Edit  </a> 
                                                        <a href="{{route('admin/employees/{employee_nic}/allocationEdit',$e->employee_id)}}" class="btn btn-warning" > Allocate </a>
                                                        </div>
                                                        </td>
                                                      
                                                        
                                                    @endforeach
</table>
</div>
</div>
</div>
    @endsection