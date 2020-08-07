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
                                                      <th scope="col">Availability</th>
                                                      <th scope="col">Project ID</th>
                                                      <th scope="col">Project details</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                  
                                                    @foreach($employee as $key => $data)
                                                    <tr>
                                                        <td>{{$data->employee_nic}}</td>
                                                        <td>{{$data->first_name}}</td>
                                                        <td>{{$data->last_name}}</td>
                                                        <td>{{$data->employee_type}}</td>
                                                        <td>{{$data->employee_category}}</td>
                                                        <td>{{$data->designation}}</td>
                                                        <td>{{$data->employee_contact_number}}</td>
                                                        <td>{{$data->email}}</td>
                                                        <td>{{$data->employee_availability}}</td>
                                                        <td>{{$data->project_id}}</td>
                                                        <td>{{$data->project_details}}</td>
                                                       </tr> 
                                                      
                                                        
                                                    @endforeach
                                                    
</table>
</div>
</div>
</div>
    @endsection