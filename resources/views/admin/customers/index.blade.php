@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Customers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="{{route('admin.customers.create')}}" class="btn btn-primary"> Add new customer </a>
</p>

           <table class="table table-bordered table-striped" id="customers_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Customer ID</th>
                                                      <th scope="col">Name of company</th>
                                                      <th scope="col">Name of contact person</th>
                                                      <th scope="col">NIC of contact person</th>
                                                      <th scope="col">Contact number</th>
                                                      <th scope="col">Designation</th>
                                                      <th scope="col">Company address</th>
                                                      <th scope="col">E-mail</th>
                                                      <!--th scope="col">Project ID</th>
                                                      <th scope="col">Project name</th>
                                                      <th scope="col">Project location</th>  
                                                      <th scope="col">Project start date</th>       
                                                      <th scope="col">Estimated project end date</th>               
                                                      <th scope="col">Warranty ID</th>
                                                      <th scope="col">Warranty details</th-->
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($customers as $c)
                                                    <tr>
                                                        <td>{{$c->customer_id}}</td>
                                                        <td>{{$c->name_of_company}}</td>
                                                        <td>{{$c->name_of_contact_person}}</td>
                                                        <td>{{$c->nic_of_contact_persond}}</td>
                                                        <td>{{$c->contact_number}}</td>
                                                        <td>{{$c->designation}}</td>
                                                        <td>{{$c->company_address}}</td>
                                                        <td>{{$c->email}}</td>
                                                        <!--td>{{$c->project_id}}</td>
                                                        <td>{{$c->project_name}}</td>
                                                        <td>{{$c->project_location}}</td>
                                                        <td>{{$c->project_start_date}}</td>
                                                        <td>{{$c->estimated_project_end_date}}</td>
                                                        <td>{{$c->warranty_id}}</td>
                                                        <td>{{$c->warranty_details}}</td-->
                                                        <td> <a href="" class="btn btn-info"> Edit </a>  
                                                    @endforeach
</table>
</div>
</div>
    @endsection