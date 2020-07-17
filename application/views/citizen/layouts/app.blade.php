
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="base_url" content="{{ base_url() }}">
  <title>PHO - COVID 19 TRAVEL TRACKER</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ vendor_url() }}/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ vendor_url() }}whirl/whirl.css">

  <link rel="icon" href="{{ asset_url() }}favicon.ico">

  @section('css-vendor')
  @show

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset_url() }}css/adminlte.min.css">

  <link rel="stylesheet" href="">

  @section('css-custom')
  @show
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ base_url() }}/citizen/home" class="navbar-brand">
        <img src="{{ asset_url() }}images/logo.png" alt="Aurora Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">PHO COVID-19 TRAVEL TRACKER</span>
      </a>


     

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ base_url() }}citizen/signout">
            <i class="fas fa-sign-out-alt"></i> Sign Out
          </a>
      
        </li>
       
       
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> @yield('page-title')</h1>
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container">

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

        @section('content')
        @show
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      DEVELOPED BY: <a href="https://github.com/jmprns">JMPRNS</a>
    </div>
    <!-- Default to the left -->
    <strong>Provincial Government of Aurora
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ vendor_url() }}jquery/jquery.min.js"></script>
<script src="{{ vendor_url() }}sweetalert2/sweetalert2.all.min.js"></script>

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
