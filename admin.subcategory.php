
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
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="images/zarcylogo.jpg" alt="AdminLTELogo" height="60" width="60">
  </div>

 <?php include("includes/admin.navbar.php"); ?>
 <?php include("includes/admin.sidebar.php"); ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub-Category</h1>
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
                <h1 class="card-title"><i class="fa fa-list"></i> Sub-Category Records </h1>
                <h3 class="card-title float-right"><button class="btn bg-gradient-green float-right"  rel="tooltip" title="Add New Sub-Category" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus"></i></button> </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                error_reporting(0);
                $error=$_GET['err'];


                if ($error == "yes") {
                  echo "<div class='alert alert-danger'><b>Error!</b> The category you have entered is already existing.</div>";
                }elseif($error == "no"){
                  echo "<div class='alert alert-success'><b>Success!</b> The category has been saved.</div>";
                }elseif($error == "update"){
                  echo "<div class='alert alert-success'><b>Success!</b> The category has been updated.</div>";
                }elseif($error == "del"){
                  echo "<div class='alert alert-success'><b>Success!</b> The category has been removed.</div>";
                }else{

                }


                ?>


                <table id="example1" class="table table-bordered table-striped">
                  <thead class="text-center">
                  <tr class="bg-gradient-red">
                    <th>ID</th>
                    <th>Sub-Category Name</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php
                    include("includes/conn.php");
                    $subcat="SELECT * FROM subcategory";
                    $result= $conn->query($subcat);
                    while ($rows= $result->fetch_assoc()){
                      # code...



                    ?>
                  <tr>
                    <td><?php echo $rows['id'];?></td>
                    <td><?php echo $rows['subcat'];?></td>
                    <td><button class="btn bg-gradient-green" rel="tooltip" title="Edit Sub-Category" data-toggle="modal" data-target="#editsubcategory<?php echo $rows['id']; ?>"><i class="fa fa-edit"></i></button> <button class="btn bg-gradient-red" rel="tooltip" title="Remove Sub-Category" data-toggle="modal" data-target="#deletesubcategory<?php echo $rows['id']; ?>"><i class="fa fa-trash" ></i></button></td>

                  </tr>
                                   <!-- modal -->
               <div class="modal fade" id="editsubcategory<?php echo $rows['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Sub-Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="includes/editsubcategory.php?id=<?php echo $rows['id']; ?>" method="POST">
                  <div class="form-group">
                    <label>Name of Sub-Category</label>

                    <input type="text" name="category2" class="form-control form-control-lg" value="<?php echo $rows['subcat'];?>">
                  </div>

                  <div class="form-group">
                    <button class="btn bg-gradient-blue btn-block" type="submit" name="updatecat">UPDATE CATEGORY</button>
                  </div>



                </form>



            </div>
            <div class="modal-footer justify-content-between bg-gradient-red p-3">

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

         <!-- modal -->
         <div class="modal fade" id="deletesubcategory<?php echo $rows['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Delete Sub-Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                <h3>Are you sure you want to remove <b><i><?php echo $rows['subcat']; ?></i></b> ?</h3>







            </div>
            <div class="modal-footer bg-gradient-red justify-content-between">
              <a type="button" href="includes/deletesubcategory.php?id=<?php echo $rows['id']; ?>" class="btn bg-gradient-blue">Remove Sub-Category</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
                    <?php
                    }

                    ?>
                  </tbody>
                </table>

                <!-- modal -->
        <div class="modal fade" id="addCategory">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Sub-Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="includes/savesubcategory.php" method="POST">
                  <div class="form-group">
                    <label>Name of Sub-Category:</label>
                    <input type="text" name="subcategory" class="form-control form-control-lg" placeholder="Enter Name of Sub-Category">
                  </div>

                  <div class="form-group">
                    <button class="btn bg-gradient-blue btn-block" type="submit" name="savesubcat">SAVE CATEGORY</button>
                  </div>



                </form>



            </div>
            <div class="modal-footer justify-content-between bg-gradient-red p-3">

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




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
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
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
<script>
$(document).ready(function(){
  $('[rel="tooltip"]').tooltip();
});
</script>
</body>
</html>
