@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Employee Allocation Details</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Employee Allocation Details</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <form class="form-horizontal" action="{{route('admin/employees/{employee_nic}/allocationUpdate', $employee->employee_id)}}" method="POST">
      <!--input type="hidden" name="_method" value="PUT"-->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      <table>
        @if($employee->employee_id)
        <tr><td>Employee ID</td><td>: {{$employee->employee_id}}</td></tr>
        @endif

        @if($employee->first_name || $employee->last_name)
        <tr><td>Employee Name</td><td>: {{$employee->first_name.' '.$employee->last_name}}</td></tr>
        @endif

        @if($employee->employee_nic)
        <tr><td>Employee NIC</td><td>: {{$employee->employee_nic}}</td></tr>
        @endif

        @if($employee->employee_type_id)
        <tr><td>Employee type</td><td>: {{$employee->type->project_type_name}}</td></tr>
        @endif

        @if($employee->employee_category_id)
        <tr><td>Employee category</td><td>: {{$employee->employeecategory->employee_category}}</td></tr>
        @endif

        @if($employee->designation)
        <tr><td>Employee designation</td><td>: {{$employee->designation}}</td></tr>
        @endif

        @if($employee->employee_contact_number)
        <tr><td>Employee contact number</td><td>: {{$employee->employee_contact_number}}</td></tr>
        @endif

        @if($employee->employee_email)
        <tr><td>Employee email</td><td>: {{$employee->employee_email}}</td></tr>
        @endif
      </table>
      <div class="form-group mt-4 mb-4">
        <label class="control-label col-sm-2" for="projecttypetxt"> Select project to allocate: </label>
        <div class="col-sm-10">
          <select class="form-control" name="project_id" required {{$employee->project_id ? 'value="'.$employee->project_id.'"' : ''}}>

            <option value="" disabled selected> Choose your option </option>
            @foreach($projects as $p)
              <option value="{{$p->project_id}}" {{$employee->project_id == $p->project_id ? 'selected' : ''}}> {{$p->project_name}} </option>
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