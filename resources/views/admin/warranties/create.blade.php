@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add Warranties</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Add Warranties</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin.warranties.store')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">

      <div class="form-group">
        <label class="control-label col-sm-2" for="projecttypetxt"> Project: </label>
        <div class="col-sm-10">
          <select class="form-control" name="project_id" required>
            <option value="" disabled selected> Choose your option </option>
            @foreach($projects as $p)
            <option value="{{$p->project_id}}"> {{$p->project_id}} - {{$p->project_name}} , {{$p->project_location}} ({{$p->customer->company_name}}) </option>
            @endforeach
          </select>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="desclbl">Description:</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="description" rows="7"></textarea>
        </div>
      </div>
      <div class="form-group">
      <p> Choose either the time period or enter number of machine hours </p>

      @if(Session::has('err'))
      <p style="color:red;"><b><small>{{Session::get('err')}}</small></b></p>
      @endif
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="emaillbl">Warranty time period:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')"
            name="warranty_start_date">
          <input type="text" placeholder="End date" onfocus="(this.type='date')" onblur="(this.type='text')"
            name="warranty_end_date">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="emaillbl">Machine hours:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="machine_hours">
        </div>
      </div>

      <div class="form-group">
        <input type="submit" class="btn btn-info" value="Save">
        <input class="btn btn-secondary float-right" type="reset" value="Reset">
      </div>

    </form>
  </div>
</div>
@endsection