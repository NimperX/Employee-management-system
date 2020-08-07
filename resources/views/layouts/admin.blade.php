<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sisaara Engineers (Pvt) Ltd</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin') }}" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="{{url('/search')}}" method="POST" role="search">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="find">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('/sisaara_logo.png') }}" alt="Sisaara Engineers (Pvt) Ltd Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sisaara Engineers (Pvt) Ltd</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User</a>
        </div>
      </div-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <?php
               $segment = Request::segment(2);
               ?>
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link 
               @if(!$segment)
               active
               @endif
               ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{route('admin.projects.index')}}" class="nav-link
            @if($segment=='projects')
               active
               @endif
               ">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Projects
                
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link
            @if($segment=='estimates')
               active
               @endif
               ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Estimates
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Labor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Machines</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Labor and machines</p>
                </a>
              </li>
</ul>
</li>
          <li class="nav-item">
            <a href="#" class="nav-link 
            @if($segment=='quotations')
               active
               @endif
               ">
            <ion-icon name="clipboard" size="small"></ion-icon>
              <p>
                Quotations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View all</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Labor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Machines</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Labor and machines</p>
                </a>
              </li>
</ul>
</li>
            <li class="nav-item">
            <a href="{{ url('/admin/timelines/gantt') }}" class="nav-link
            @if($segment=='timelines')
               active
               @endif
               ">
            <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Timelines
              </p>
            </a>
            <li class="nav-item">
            <a href="{{route('admin.employees.index')}}" class="nav-link
            @if($segment=='employees')
               active
               @endif
               ">
            <ion-icon name="person"></ion-icon>
              <p>
                Employees
              </p>
            </a>
            <li class="nav-item">
            <a href="{{route('admin.labor.index')}}" class="nav-link
             @if($segment=='labor')
               active
               @endif
               ">
              <ion-icon name="people"></ion-icon>
              <p>
                Labor
              </p>
            </a>
            <li class="nav-item">
            <a href="{{route('admin.machines.index')}}" class="nav-link
            @if($segment=='machines')
               active
               @endif
               ">
            <ion-icon name="settings"></ion-icon>
              <p>
                Machines
              </p>
            </a>
            <li class="nav-item">
            <a href="{{route('admin.suppliers.index')}}" class="nav-link
            @if($segment=='suppliers')
               active
               @endif
               ">
            <ion-icon name="person-add"></ion-icon>
              <p>
                Suppliers
              </p>
            </a>
            <li class="nav-item">
            <a href="{{route('admin.warranties.index')}}" class="nav-link
            @if($segment=='warranties')
               active
               @endif
               ">
            <ion-icon name="reader"></ion-icon>
              <p>
                Warranty
              </p>
            </a>
            <li class="nav-item">
            <a href="{{route('admin.expenses.index')}}" class="nav-link
            @if($segment=='expenses')
               active
               @endif
               ">
            <ion-icon name="cash"></ion-icon>
              <p>
                Expenses
              </p>
            </a>
            <li class="nav-item">
            <a href="{{route('admin.customers.index')}}" class="nav-link
            @if($segment=='customers')
               active
               @endif
               ">
              <ion-icon name="person-circle"></ion-icon>
              <p>
                Customers
              </p>
</a>
              
              

          <li class="nav-header">Controls</li>
          <li class="nav-item">
          <a  class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="nav-icon far fa-circle text-danger"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
           
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong> Sisaara Engineers (Pvt) Ltd</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>
