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
              <form action="{{route('admin.print.customers')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="customer_id" value="all">
                <input type="submit" class="btn btn-success  mb-2" value="Print Report">
              </form>
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
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($customers as $c)
                                                    <tr>
                                                        <td>{{$c->customer_id}}</td>
                                                        <td>{{$c->company_name}}</td>
                                                        <td>{{$c->name_of_contact_person}}</td>
                                                        <td>{{$c->nic_of_contact_person}}</td>
                                                        <td>{{$c->contact_number}}</td>
                                                        <td>{{$c->designation}}</td>
                                                        <td>{{$c->company_address}}</td>
                                                        <td>{{$c->email}}</td>
                                                        <td> <a href="{{route('admin.customers.edit',$c->customer_id)}}" class="btn btn-info mb-2"> Edit </a><br>
                                                          <form action="{{route('admin.customers.destroy',$c->customer_id)}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                          <button type="submit" class="btn btn-danger mb-2"> Delete </button>
                                                          </form>
                                                          <form action="{{route('admin.print.customers')}}" method="POST">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="customer_id" value="{{$c->customer_id}}">
                                                            <input type="submit" class="btn btn-success  mb-2" value="Print Report">
                                                          </form>
                                                        </td>
                                                    @endforeach
</table>
</div>
</div>
    @endsection