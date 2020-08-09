@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Machine Allocation Details</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Machine Allocation Details</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin/machines/{machine_id}/allocationUpdate', $machine->machine_id)}}" method="POST">
      <!--input type="hidden" name="_method" value="PUT"-->
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      @method('PUT')
      <table>
        @if($machine->machine_id)
        <tr><td>Machine ID</td><td>: {{$machine->machine_id}}</td></tr>
        @endif

        @if($machine->type->machine_type_name)
        <tr><td>Machine type</td><td>: {{$machine->type->machine_type_name}}</td></tr>
        @endif

        @if($machine->machine_name)
        <tr><td>Machine name</td><td>: {{$machine->machine_name}}</td></tr>
        @endif

        @if($machine->model_number)
        <tr><td>Model number</td><td>: {{$machine->model_number}}</td></tr>
        @endif

        @if($machine->machine_purchase_date)
        <tr><td>Machine purchase date</td><td>: {{$machine->machine_purchase_date}}</td></tr>
        @endif

        @if($machine->additional_details)
        <tr><td>Additional details</td><td>: {{$machine->additional_details}}</td></tr>
        @endif
      </table>
      <div class="form-group mt-4 mb-4">
        <label class="control-label col-sm-2" for="projecttypetxt"> Select project to allocate: </label>
        <div class="col-sm-10">
          <select class="form-control" name="project_id" required {{$machine->project_id ? 'value="'.$machine->project_id.'"' : ''}}>

            <option value="" disabled selected> Choose your option </option>
            @foreach($projects as $p)
              <option value="{{$p->project_id}}" {{$machine->project_id == $p->project_id ? 'selected' : ''}}> {{$p->project_name}} </option>
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