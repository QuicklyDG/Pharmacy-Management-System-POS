
<!DOCTYPE html>
<html lang="en">
<?php include("includes/session.inc.php"); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zarcy Drugstore</title>
  <link href="images/zarcylogo.jpg" type="image/x-icon">
  <link rel="icon" href="images/zarcylogo.jpg">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="images/zarcylogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div>

 <?php include("includes/staff.navbar.php"); ?>
 <?php include("includes/staff.sidebar.php"); ?>
 <?php include("includes/conn.php"); ?>

 

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php
                error_reporting(0);
                $error=$_GET['err'];


                if ($error == "yes") {
                  echo "<div class='alert alert-danger'><b>Error!</b> The category you have entered is already existing .</div>";
                }elseif($error == "no"){
                  echo "<div class='alert alert-success'><b>Success!</b> The Password has been updated.</div>";
                }elseif($error == "password"){
                  echo "<div class='alert alert-danger'><b>Error!</b> The Old Password you have entered is incorrect.</div>";
                }elseif($error == "confirm"){
                  echo "<div class='alert alert-danger'><b>Error!</b> The New Password didn't matched.</div>";
                }else{

                }


                ?>
        <div class="row">
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                date_default_timezone_set("Asia/Manila");
                $today = date("Y-m-d");

                $sql="SELECT SUM(salestotal) AS sales FROM final_sales WHERE posted BETWEEN '$today' AND '$today'";
                $rsql=$conn->query($sql);
                $gsql=$rsql->fetch_assoc();
                ?>
                <h3>₱ <?php echo number_format($gsql['sales'],2); ?></h3>

                <h4 class="text-bold" style="font-family: times new roman">Daily Sales</h4>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="admin.salesreport.php?start=&end=&mode=4" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
                date_default_timezone_set("Asia/Manila");
                $today = date("Y-m-d");

                $sql2="SELECT SUM(profittotal) AS profit FROM final_sales WHERE posted BETWEEN '$today' AND '$today'";
                $rsql2=$conn->query($sql2);
                $gsql2=$rsql2->fetch_assoc();
                ?>
                <h3>₱ <?php echo number_format($gsql2['profit'],2); ?></h3>

                <h4 class="text-bold" style="font-family: times new roman">Daily Profit</h4>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="admin.salesreport.php?start=&end=&mode=4" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
           

                $sql3="SELECT COUNT(meds) AS drugs FROM inventory";
                $rsql3=$conn->query($sql3);
                $gsql3=$rsql3->fetch_assoc();
                ?>
                <h3><?php echo $gsql3['drugs']; ?></h3>

                <h4 class="text-bold" style="font-family: times new roman">No. of Medicine/Drugs</h4>
              </div>
              <div class="icon">
                <i class="fas fa-capsules"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
           

           $sql4="SELECT COUNT(id) AS staff FROM user WHERE role='Staff'";
           $rsql4=$conn->query($sql4);
           $gsql4=$rsql4->fetch_assoc();
           ?>
           <h3><?php echo $gsql4['staff']; ?></h3>

                <h4 class="text-bold" style="font-family: times new roman;">No. of Staff</h4>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer> <?php include("includes/footer.php"); ?></footer>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
