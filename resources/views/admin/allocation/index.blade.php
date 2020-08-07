@extends('layouts.admin')
@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Allocation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Allocation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
          <p>
              <a href="" class="btn btn-primary"> Btn </a>
              
</p>

<p>
<a href="" class="btn btn-success"> Btn </a>
</p>
           <table class="table table-bordered table-striped" id="allocation_table">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col">Project ID</th>
                                                      <th scope="col">Employee name</th>
                                                      <th scope="col">Machine ID</th>
                                                      <th> Actions </th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                
                                                    @foreach($projects as $row)
                                                    <tr>
                                                        <td>{{$row->project_id}}</td>
                                                        
                                                        <td> <a href="" class="btn btn-info"> Edit </a>  
                                                    @endforeach
</table>
</div>
</div>
    @endsection