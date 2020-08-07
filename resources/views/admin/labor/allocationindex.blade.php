@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Labor Allocation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Labor Allocation</li>
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
           <table class="table table-bordered table-striped" id="labor_allocation_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Supplier ID</th>
                                                      <th scope="col">Supplier details</th>
                                                      <th scope="col">Labor NIC</th>
                                                      <th scope="col">First name</th>
                                                      <th scope="col">Last name</th>
                                                      <th scope="col">Labor type</th>
                                                      <th scope="col">Labor category</th>
                                                      <th scope="col">Designation</th>
                                                      <th scope="col">Contact number</th>
                                                      <th scope="col">Availability</th>
                                                      <th scope="col">Project ID</th>
                                                      <th scope="col">Project details</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                  
                                                    @foreach($labor as $key => $data)
                                                    <tr>
                                                        <td>{{$data->supplier_id}}</td>
                                                        <td>{{$data->supplier_details}}</td>
                                                        <td>{{$data->labor_nic}}</td>
                                                        <td>{{$data->first_name}}</td>
                                                        <td>{{$data->last_name}}</td>
                                                        <td>{{$data->labor_type}}</td>
                                                        <td>{{$data->labor_category}}</td>
                                                        <td>{{$data->designation}}</td>
                                                        <td>{{$data->labor_contact_number}}</td>
                                                        <td>{{$data->labor_availability}}</td>
                                                        <td>{{$data->project_id}}</td>
                                                        <td>{{$data->project_details}}</td>
                                                       </tr> 
                                                      
                                                        
                                                    @endforeach
                                                    
</table>
</div>
</div>
</div>
    @endsection