@extends('layouts.admin')
@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Customer</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Customers</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">

        <form class="form-horizontal" action="{{route('admin.customers.update', $customer->customer_id)}}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{csrf_token()}}">


            {{-- <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Customer ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="customer_id" autofocus>
                                           
                                          </div>
                                        </div> --}}

            <div class="form-group">
                <label class="control-label col-sm-2" for="projectidlbl">Name of company:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="company_name" value="{{$customer->company_name}}">

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="projectidlbl">Name of contact person:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name_of_contact_person"
                        value="{{$customer->name_of_contact_person}}">

                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-sm-2" for="projectidlbl">NIC of contact person:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nic_of_contact_person"
                        value="{{$customer->nic_of_contact_person}}">

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-10" for="customercontactlbl">Contact number(enter as 94..):</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="contact_number" required
                        value="{{$customer->contact_number}}">


                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="projectidlbl">Designation:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="designation" value="{{$customer->designation}}">

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="projectidlbl">Company address:</label>
                <div class="col-sm-10">
                    <textarea name="company_address" class="form-control" rows="3" cols="4">{{$customer->company_address}}
                                           </textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="emaillbl">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" required value="{{$customer->email}}">
                </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Update">
                <input class="btn btn-secondary float-right" type="reset" value="Reset">
            </div>
        </form>
    </div>
</div>

@endsection