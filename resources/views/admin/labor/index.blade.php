@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Labor</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Labor</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <p>
      <a href="{{route('admin.labor.create')}}" class="btn btn-primary"> Add new laborer </a>
    </p>
    <p>
      <a href="{{url('/admin/labor/allocationindex')}}" class="btn btn-success"> View allocation </a>
    </p>
    <form action="{{route('admin.print.labors')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="submit" class="btn btn-warning mb-2" value="View Report">
    </form>
    <div style="overflow-x:auto;">
      <table class="table table-bordered table-striped" id="labor_table">
        <thead>
          <tr>
            <th scope="col">Supplier ID</th>
            <th scope="col">Supplier details</th>
            <th scope="col">NIC of laborer</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">Labor type</th>
            <th scope="col">Labor category</th>
            <th scope="col">Designation</th>
            <th scope="col">Contact number</th>
            <th scope="col">Availability</th>
            <th scope="col">Hired date</th>
            <th scope="col">Estimated work end date</th>
            <th> Actions </th>
          </tr>
        </thead>
        <tbody>

          @foreach($labor as $l)
          <tr>
            <td>{{$l->supplier->supplier_id}}</td>
            <td>{{$l->supplier->supplier_company_name}}</td>
            <td>{{$l->labor_nic}}</td>
            <td>{{$l->first_name}}</td>
            <td>{{$l->last_name}}</td>
            <td>{{$l->type->project_type_name}}</td>
            <td>{{$l->employeecategory->employee_category}}</td>
            <td>{{$l->designation == '' ? '-' : $l->designation}}</td>
            <td>{{$l->labor_contact_number}}</td>
            <td>{{$l->labor_availability == 1 ? 'Available' : 'Not available'}}</td>
            <td>{{$l->labor_hired_date}}</td>
            <td>{{$l->labor_end_date}}</td>
            <td>
              <div class="btn-group" role="group">
                <a href="{{route('admin.labor.edit', $l->labor_id)}}" class="btn btn-info"> Edit </a>
                <a href="{{route('admin/labor/{labor_nic}/allocationEdit',$l->labor_id)}}" class="btn btn-warning">
                  Allocate </a>
              </div>
            </td>


            @endforeach
      </table>
    </div>
  </div>
</div>
@endsection