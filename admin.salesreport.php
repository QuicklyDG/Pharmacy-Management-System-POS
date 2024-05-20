
<!DOCTYPE html>
<html lang="en">
<?php include("includes/session.inc.php"); ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Zarcy Drugstore</title>
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
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="images/zarcylogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div> -->

 <?php include("includes/admin.navbar.php"); ?>
 <?php include("includes/admin.sidebar.php"); ?>
<?php 
  $start = $_GET['start'];
  $end = $_GET['end'];

  if($start == "" && $end == ""){
    $start = date("Y-m-d");
    $end = date("Y-m-d");
  }else{
    $start = $start;
    $end = $end;
  }

?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sales Report</h1>
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
     
             <div class="card">
              <div class="card-header bg-gradient-red">
                <h1 class="card-title"><i class="fa fa-list"></i> Sales Report</h1>
                <h3 class="card-title float-right"> <a href="print.php?start=<?php echo $start; ?>&end=<?php echo $end; ?>" class="btn bg-gradient-green float-right"  rel="tooltip" title="Print Sales Report"><i class="fa fa-print"></i></a> </h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form>
                <div class="row">
                    
                    <div class="col-sm-2 col-12">
                        <label class="h3 text-right">Start</label>
                    </div>

                    <div class="col-sm-3 col-12">
                      <input type="date" name="start" class="form-control form-control-lg" required>
                    </div>

                    <div class="col-sm-2 col-12">
                        <label class="h3 text-right">End</label>
                    </div>

                    <div class="col-sm-3 col-12">
                    <input type="date" name="end" class="form-control form-control-lg" required>
                    <input type="hidden" name="mode" value="4">
                    </div>

                    <div class="col-sm-2 col-12">
                      <button type="submit" class="btn bg-gradient-green btn-block">GENERATE</button>
                    </div>
                   

                </div>
                </form>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr class="bg-gradient-red">
                    <th>Invoice</th>
                    <th>Date of Purchase</th>
                    <th>Profit</th>
                    <th>Sales</th>
                    
                    

                  </tr>
                  </thead>

                  <tbody class="text-center">

<?php
  include("includes/conn.php");

  date_default_timezone_set("Asia/Manila");
  $start2 = date("Y-m-d");
  $end2 = date("Y-m-d");

  if($start == "" && $end == ""){
    $salestotal="SELECT * FROM final_sales WHERE posted BETWEEN '$start2' AND '$end2' ORDER BY posted ASC";
  }else{
    $salestotal="SELECT * FROM final_sales WHERE posted BETWEEN '$start' AND '$end' ORDER BY posted ASC";
  }

 
  $result= $conn->query($salestotal);
  while ($rows= $result->fetch_assoc()){
    $d = strtotime($rows['posted']);
    $post = date("M d, Y",$d);
  ?>
<tr>
<td><?php echo $rows['invoice_id']; ?></td>
<td><?php echo $post;?></td>
<td><b>₱ <?php echo number_format($rows['profittotal'],2);?></b></td>
<td><b>₱ <?php echo number_format($rows['salestotal'],2);?></b></td>


  <?php
  }

  ?>
  
<tr>
  <td colspan="2" class="text-right">TOTAL:</td>
  <?php 
  
  date_default_timezone_set("Asia/Manila");
  $start2 = date("Y-m-d");
  $end2 = date("Y-m-d");
    if($start == "" && $end == ""){
    $report="SELECT SUM(salestotal) AS sales, SUM(profittotal) AS profit FROM final_sales WHERE posted BETWEEN '$start2' AND '$end2'";
    }else{
      $report="SELECT SUM(salestotal) AS sales, SUM(profittotal) AS profit FROM final_sales WHERE posted BETWEEN '$start' AND '$end'";
    }
    $res=$conn->query($report);
    $rows3=$res->fetch_assoc();
  ?>
  <td><b>₱ <?php echo number_format($rows3['profit'],2);?></b></td>
  <td><b>₱ <?php echo number_format($rows3['sales'],2);?></b></td>

</tr>
</tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include ("includes/footer.php");?>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": false,
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