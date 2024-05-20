<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zarcy Drugstore | Log in</title>
  <link href="images/zarcylogo.jpg" type="image/x-icon">
  <link rel="icon" href="images/zarcylogo.jpg">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Sweetalert -->
<link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-image:url('images/z2.jpg');background-repeat: no-repeat;background-size: 100% 100%;">
<div class="login-box">

   <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="images/zarcylogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div>


  <?php
error_reporting(0);
$swal=$_GET['swal'];
?>
<input type="hidden"id="check_swal" name="check_swal" value="<?php echo $swal; ?>">


  <!-- /.login-logo -->
  <div class="card card-outline card-danger text-dark" style="background-color: rgba(0.5,0.5,0.5,0.5)">
    <div id="logo">
    <img src="images/zarcylogo.jpg" height="120" width="360">
    </div>
    <div class="card-body">
      <p class="login-box-msg" style="color: white">Sign in to start your session</p>

      <form action="includes/login.inc.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-outline-danger bg-gradient-red btn-block">Sign In</button>
            

          </div>
          <?php include("includes/alert.php"); ?>
          <!-- /.col -->
        </div>
      </form>

     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script>
      $(document).ready(function(){
    
        var mess = document.getElementById('check_swal').value;
      
          if(mess == 'YES') {
            Swal.fire(
              'Good job!',
              'You Just Registered an Account!',
              'success'
            )
          }

          if (mess == 'NO') {
            Swal.fire({
              icon: 'error',
              title: 'Sorry...',
              text: 'Invalid Credentials, Please try again.',
              
            })
          }

          if (mess == 'NOACC') {
            Swal.fire({
              icon: 'error',
              title: 'Sorry',
              text: 'Please Register First.',
              
            })
          }
        



      });
    </script>
</body>
</html>
