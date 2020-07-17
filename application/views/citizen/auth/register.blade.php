
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
  <title>PHO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ vendor_url() }}sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ base_url() }}/citizen/home" class="navbar-brand">
        <img src="../assets/images/logo.png" alt="Aurora Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">PHO COVID-19 TRAVEL TRACKER</span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 class="m-0 text-dark text-center"> Registration Form</h1>
            </div><!-- /.col -->
           
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <div class="content">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 offset-md-3">
                    <div class="card py-3 px-5">
                        <form id="register-form" action="#" method="POST">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="fname" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Middle Name</label>
                                        <input type="text" name="mname"  class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="lname" required class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Birthday</label>
                                        <input type="date" name="birthday" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Sex</label>
                                        <select name="sex" required class="form-control">
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nationality</label>
                                        <input name="nationality" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact Number</label>
                                        <input name="contact" required type="number" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Current Address</label>
                                <input type="text" name="address" required class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" placeholder="someone@email.com" name="email" required class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="cpassword" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <hr>


                            <button type="submit" class="btn btn-block bg-gradient-primary">Submit</button>
        
                        </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      DEVELOPED BY: JMPRNS
    </div>
    <!-- Default to the left -->
    PROVINCIAL GOVERNMENT OF AURORA
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ vendor_url() }}/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>

<script src="../assets/js/register.min.js"></script>
</body>
</html>
