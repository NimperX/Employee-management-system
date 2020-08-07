@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Customer</h1>
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

      <form class="form-horizontal" action="" method="POST">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      

      <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Customer ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="customer_id" autofocus>
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Name of company:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="company_name">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Name of contact person:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name_of_contact_person">
                                           
                                          </div>
                                        </div>

                                        
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">NIC of contact person:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nic_of_contact_person">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-10" for="customercontactlbl">Contact number(enter as 94..):</label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="contact_number" required>
                                             
                                         
                            </div>
                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Designation:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="designation">
                                           
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Company address:</label>
                                          <div class="col-sm-10">
                                            <textarea name="company_address" class="form-control" rows="3" cols="4" >
                                           </textarea>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="emaillbl">Email:</label>
                                              <div class="col-sm-10">
                                              <input type="email" class="form-control" name="email" required>
                                              </div>
                                            </div>

                                            <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Project ID:</label>
                                          <div class="col-sm-10">
                                          <select class="form-control" name="project_id">
                                            <option value ="" disabled selected> Choose your option </option> 
                                            @foreach($projects as $p)
                                            <option value="{{$p->project_id}}"> {{$p->project_id}} </option> 
                                               
                                               @endforeach
                                               </select>
                                          </div>
                                        </div>
                                       
                                       //should be autofilled
                                        <div class="form-group">
                                        <label class="control-label col-sm-2" for="projectnamelbl">Project name:</label>
                                          <div class="col-sm-10">
                                          <input type="text" class="form-control" name="project_name">
                                         
                                          </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="control-label col-sm-2" for="projectnamelbl">Project location:</label>
                                          <div class="col-sm-10">
                                          <input type="text" class="form-control" name="project_location">
                                         
                                          </div>
                                        </div>

                                        <div class="form-group">
                                              <label class="control-label col-sm-2" for="startdatelbl">Start Date:</label>
                                              <div class="col-sm-10">
                                                <input type="text" placeholder="Start date" onfocus="(this.type='date')" onblur="(this.type='text')" name="project_start_date">  
                                          </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="control-label col-sm-2" for="startdatelbl">Estimated end date:</label>
                                              <div class="col-sm-10">
                                                <input type="text" placeholder="Estimated end date" onfocus="(this.type='date')" onblur="(this.type='text')" name="estimated_project_end_date">  
                                          </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="projectidlbl">Warranty ID:</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="warranty_id" autofocus>
                                           
                                          </div>
                                        </div>
                                        
                                        //should be autofilled
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="projectidlbl">Warranty details:</label>
                                          <div class="col-sm-10">
                                            <textarea name="warranty_details" class="form-control" rows="3" cols="5" >
                                           </textarea>
                                          </div>
                                        </div>
                                        
                                          
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-info" value="Save">
                                            <input class="btn btn-secondary float-right" type="reset" value="Reset">
                                            </div>

                                            
                                      
</div>
</div>

    @endsection