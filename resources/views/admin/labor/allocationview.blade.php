@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Labor Allocation Details</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Labor Allocation Details</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin/labor/{labor_nic}/allocationUpdate', $labor->labor_id)}}" method="POST">
      <!--input type="hidden" name="_method" value="PUT"-->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      <table>
        @if($labor->labor_id)
        <tr><td>Labor ID</td><td>: {{$labor->labor_id}}</td></tr>
        @endif

        @if($labor->first_name || $labor->last_name)
        <tr><td>Labor Name</td><td>: {{$labor->first_name.' '.$labor->last_name}}</td></tr>
        @endif

        @if($labor->labor_nic)
        <tr><td>Labor NIC</td><td>: {{$labor->labor_nic}}</td></tr>
        @endif

        @if($labor->labor_type_id)
        <tr><td>Labor type</td><td>: {{$labor->type->project_type_name}}</td></tr>
        @endif

        @if($labor->labor_category_id)
        <tr><td>Labor category</td><td>: {{$labor->employeecategory->employee_category}}</td></tr>
        @endif

        @if($labor->designation)
        <tr><td>Labor designation</td><td>: {{$labor->designation}}</td></tr>
        @endif

        @if($labor->labor_contact_number)
        <tr><td>Labor contact number</td><td>: {{$labor->labor_contact_number}}</td></tr>
        @endif

        @if($labor->labor_email)
        <tr><td>Labor email</td><td>: {{$labor->labor_email}}</td></tr>
        @endif

        @if($labor->labor_hired_date)
        <tr><td>Labor hired date</td><td>: {{$labor->labor_hired_date}}</td></tr>
        @endif
        
        @if($labor->labor_end_date)
        <tr><td>Labor hire end date</td><td>: {{$labor->labor_end_date}}</td></tr>
        @endif
      </table>

      @if($labor->supplier_id)
      <h5 class="mt-4">Suppplier details</h5>
      <table>
        @if($labor->supplier->supplier_company_name)
        <tr><td>Supplier Company</td><td>: {{$labor->supplier->supplier_company_name}}</td></tr>
        @endif

        @if($labor->supplier->name_of_contact_person)
        <tr><td>Contact person</td><td>: {{$labor->supplier->name_of_contact_person}}</td></tr>
        @endif

        @if($labor->supplier->supplier_contact_number)
        <tr><td>Contact number</td><td>: {{$labor->supplier->supplier_contact_number}}</td></tr>
        @endif

        @if($labor->supplier->supplier_email)
        <tr><td>Email address</td><td>: {{$labor->supplier->supplier_email}}</td></tr>
        @endif
      </table>
      @endif

      <div class="form-group mt-4 mb-4">
        <label class="control-label col-sm-2" for="projecttypetxt"> Select project to allocate: </label>
        <div class="col-sm-10">
          <select class="form-control" name="project_id" required {{$labor->project_id ? 'value="'.$labor->project_id.'"' : ''}}>

            <option value="" disabled selected> Choose your option </option>
            @foreach($projects as $p)
              <option value="{{$p->project_id}}" {{$labor->project_id == $p->project_id ? 'selected' : ''}}> {{$p->project_name}} </option>
            @endforeach
          </select>

        </div>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Allocate">
        <input class="btn btn-secondary float-right" type="reset" value="Reset">
      </div>
    </form>
  </div>
</div>
@endsection