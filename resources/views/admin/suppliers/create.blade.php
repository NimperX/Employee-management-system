@extends('layouts.admin')
@section('content')


<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add Suppliers</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
          <li class="breadcrumb-item active">Add Suppliers</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">

    <form class="form-horizontal" action="{{route('admin.suppliers.store')}}" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">


      <div class="form-group">
        <label class="control-label col-sm-2" for="customernamelbl">Supplier company name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="supplier_company_name" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Name of contact person:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name_of_contact_person" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="customercontactlbl">Contact number:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="supplier_contact_number" required>


        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="emaillbl">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="supplier_email" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Address:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="supplier_address" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="hiredcountlbl">No. of employees hired:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="number_of_employees_hired" required>

        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">Hired Date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Hired date" onfocus="(this.type='date')" onblur="(this.type='text')"
            name="hired_date" required>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="startdatelbl">Estimated work end date:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Estimated work end date" onfocus="(this.type='date')"
            onblur="(this.type='text')" name="estimated_end_date" required>
        </div>
      </div>
s

      <div class="form-group">
        <label class="control-label col-sm-2" for="projectnamelbl">Additional remarks:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="additional_remarks">

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