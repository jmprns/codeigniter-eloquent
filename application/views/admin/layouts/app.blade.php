
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ vendor_url() }}fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ vendor_url() }}whirl/whirl.css">

  @section('css-vendor')
  @show

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset_url() }}css/adminlte.min.css">

  <link rel="icon" href="{{ asset_url() }}favicon.ico">

  @section('css-custom')
  @show

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form action="{{ base_url() }}super/request/" class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
     
      <li class="nav-item">
        <a class="nav-link" href="{{ base_url() }}super/signout">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ base_url() }}super/dashboard" class="brand-link">
      <img src="{{ asset_url() }}images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light ml-3">AURORA MIS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ base_url() }}uploads/admins/{{ $_SESSION['admin']['data']['image'] }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
         <a href="#" class="d-block">{{ $_SESSION['admin']['data']['fname'] }} {{ $_SESSION['admin']['data']['lname'] }}</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item">
            <a href="{{ base_url() }}super/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ base_url() }}super/request/all" class="nav-link">
              <i class="nav-icon fas fa-file-import"></i>
              <p>Requests</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Reports</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('page-title')</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        @if($this->session->flashdata('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check-circle"></i> Success!</h5>
            {{ $this->session->flashdata('success') }}
        </div>
        @endif
  
        @if($this->session->flashdata('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Warning!</h5>
            {{ $this->session->flashdata('warning') }}
        </div>
        @endif
  
        @if($this->session->flashdata('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Ooops!</h5>
            {{ $this->session->flashdata('error') }}
        </div>
        @endif
  

        @yield('content')
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      DEVELOPED BY: <a href="https://github.com/jmrpns" target="_new">JMRPNS</a>
    </div>
    <!-- Default to the left -->
   PROVINCIAL GOVERNMENT OF AURORA
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ vendor_url() }}jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ vendor_url() }}bootstrap/js/bootstrap.bundle.min.js"></script>
@section('js-vendor')
@show
<!-- AdminLTE App -->
<script src="{{ asset_url() }}js/adminlte.min.js"></script>
@section('js-custom')
@show
</body>
</html>
