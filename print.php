
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
<body onload="window.print();">

<?php 
  $start = $_GET['start'];
  $end = $_GET['end'];

  $d = strtotime($start);
  $dpost = date("M d, Y",$d);

  $e = strtotime($end);
  $epost = date("M d, Y",$e);

?>
 
    <div class="container">

                <h3 class="text-center"><img src="images/zarcylogo.jpg" height="75" width="200"> <br> Sales Report from <?php echo $dpost; ?> to <?php echo $epost; ?></h3>
                <hr>
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Invoice</th>
                    <th>Date of Purchase</th>
                    <th>Profit</th>
                    <th>Sales</th>
                    
                    

                  </tr>
                  </thead>

                  <tbody class="text-center">

<?php
  include("includes/conn.php");

  $salestotal="SELECT * FROM final_sales WHERE posted BETWEEN '$start' AND '$end' ORDER BY posted ASC";
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
    $report="SELECT SUM(salestotal) AS sales, SUM(profittotal) AS profit FROM final_sales WHERE posted BETWEEN '$start' AND '$end'";
    $res=$conn->query($report);
    $rows3=$res->fetch_assoc();
  ?>
  <td><b>₱ <?php echo number_format($rows3['profit'],2);?></b></td>
  <td><b>₱ <?php echo number_format($rows3['sales'],2);?></b></td>

</tr>
</tbody>
                </table>
    
</div>
              
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