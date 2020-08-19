@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Suppliers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Suppliers</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="{{route('admin.suppliers.create')}}" class="btn btn-primary"> Add new supplier </a>
              <form action="{{route('admin.print.suppliers')}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="supplier_id" value="all">
                <input type="submit" class="btn btn-success  mb-2" value="Print Report">
              </form>
</p>

           <table class="table table-bordered table-striped" id="suppliers_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Supplier ID</th>
                                                      <th scope="col">Supplier company name</th>
                                                      <th scope="col">Name of contact person</th>
                                                      <th scope="col">Contact number</th>
                                                      <th scope="col">E-mail</th>
                                                      <th scope="col">Address</th>
                                                      <th scope="col">Hired date</th>
                                                      <th scope="col">Estimated work end date</th>
                                                      <th scope="col">Additional remarks</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($suppliers as $s)
                                                    <tr>
                                                        <td>{{$s->supplier_id}}</td>
                                                        <td>{{$s->supplier_company_name}}</td>
                                                        <td>{{$s->name_of_contact_person}}</td>
                                                        <td>{{$s->supplier_contact_number}}</td>
                                                        <td>{{$s->supplier_email}}</td>
                                                        <td>{{$s->supplier_address}}</td>
                                                        <td>{{$s->hired_date}}</td>
                                                        <td>{{$s->estimated_end_date}}</td>
                                                        <td>{{$s->additional_remarks}}</td>
                                                        <td> <a href="{{route('admin.suppliers.edit', $s->supplier_id)}}" class="btn btn-info mb-2"> Edit </a><br>
                                                          <form action="{{route('admin.print.suppliers')}}" method="POST">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="supplier_id" value="{{$s->supplier_id}}">
                                                            <input type="submit" class="btn btn-success  mb-2" value="View">
                                                          </form>
                                                        </td>
                                                    </tr> 
                                                    @endforeach
</table>
</div>
</div>
    @endsection