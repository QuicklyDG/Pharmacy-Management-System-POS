
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

 <?php include("includes/staff.navbar.php"); ?>
 <?php include("includes/staff.sidebar.php"); ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inventory</h1>
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
              <div class="card-header bg-gradient-red display-flex">
                <h1 class="card-title"><i class="fa fa-list"></i> Inventory Records </h1>   
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                error_reporting(0);
                $error=$_GET['err'];


                if ($error == "yes") {
                  echo "<div class='alert alert-danger'><b>Error!</b> The drugs/medicine you have entered is already existing.</div>";
                }elseif($error == "no"){
                  echo "<div class='alert alert-success'><b>Success!</b> The drugs/medicine has been saved.</div>";
                }elseif($error == "update"){
                  echo "<div class='alert alert-success'><b>Success!</b> The drugs/medicine has been updated.</div>";
                }elseif($error == "addstock"){
                  echo "<div class='alert alert-success'><b>Success!</b> The new drugs/medicine stock has been added.</div>";
                }elseif($error == "del"){
                  echo "<div class='alert alert-success'><b>Success!</b> The drugs/medicine has been removed.</div>";
                }else{

                }


                ?>

                <table id="example1" class="table table-bordered table-striped"> 
                  <thead class="text-center">
                  <tr>
                    <th>Main Category</th>
                    <th>Sub-Category</th>
                    <th>Medicine</th>
                    <th>Brand</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th>Selling Price</th>
                    <th>Auth</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody class="text-center">

                  <?php
                    include("includes/conn.php");
                    $maincat="SELECT * FROM inventory";
                    $result= $conn->query($maincat);
                    while ($rows= $result->fetch_assoc()){
                    


                      $mdate = strtotime($rows['mdate']);
                      $mdate2 = date("m/d/Y",$mdate);

                      $exdate = strtotime($rows['exdate']);
                      $exdate2 = date("m/d/Y",$exdate);


                      

                    ?>
                  <tr>
                  <td><?php echo $rows['maincat'];?></td>
                  <td><?php echo $rows['subcat'];?></td>
                  <td><?php echo $rows['meds'];?></td>
                  <td><?php echo $rows['brand'];?></td>
                  <td><?php echo $rows['descript'];?></td>
                  <td><?php echo $rows['stock'];?></td>
                  <td><?php echo $rows['sellprice'];?></td>
                  <td><?php echo $rows['auth'];?></td>
                  <td><button class="btn bg-gradient-blue" rel="tooltip" title="Add Stock" data-toggle="modal" data-target="#addstock<?php echo $rows['id']; ?>"><i class="fa fa-layer-group"></i></button>
                  <button class="btn bg-gradient-yellow" rel="tooltip" title="Stock History" data-toggle="modal" data-target="#stockhistory<?php echo $rows['id']; ?>"><i class="fa fa-history"></i></button>
                  

                 

                    <!-- modal -->
                    <div class="modal fade" id="delinventory<?php echo $rows['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-trash"></i> Remove Medicine/Drugs</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

           

                 
                <h3>Are you sure you want to remove <b><i><?php echo $rows['meds']; ?></i></b> ?</h3>


            </div>
            <div class="modal-footer bg-gradient-red justify-content-between">
              <a type="button" href="includes/deleteinventory.php?id=<?php echo $rows['id']; ?>" class="btn bg-gradient-blue">Remove Category</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

                                   <!-- modal -->
                                   <div class="modal fade" id="addstock<?php echo $rows['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Add New Stock</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="includes/addstock.php?id=<?php echo $rows['id']; ?>" method="POST">
                      <div class="text-left">
              
                  <div class="form-group">
                    <label>Current Stock</label>
                    <input type="number" name="current" value="<?php echo $rows['stock']?>"class="form-control form-control-lg" readonly>
                  </div>

                  <div class="form-group">
                    <label>Stock to Add</label>
                    <input type="number" name="stock" class="form-control form-control-lg" required>
                  </div>

                  <div class="form-group">
                    <label>Manufactured Date</label>
                    <input type="date" name="mdate" class="form-control form-control-lg" required>
                  </div>

                  <div class="form-group">
                    <label>Expired Date</label>
                    <input type="date" name="exdate" class="form-control form-control-lg" required>
                  </div>


                  <div class="form-group">
                    <button class="btn bg-gradient-blue btn-block" type="submit" name="addstock">ADD STOCK</button>
                  </div>
                

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
        <div class="modal fade" id="stockhistory<?php echo $rows['id']; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"> 
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Stock History of <b><i><?php echo $rows['meds']; ?></i></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                      <div class="row">
                        

                        
                        <div class="col-sm-3 col-3 text-center">
                          <h5><b><i>Mfg Date - Exp Date</i></b></h5>
                        </div>
                        <div class="col-sm-2 col-2 text-center">
                          <h5><b><i>Last Stock</i></b></h5>
                        </div>
                        <div class="col-sm-2 col-2 text-center">
                          <h5><b><i>Added Stock</i></b></h5>
                        </div>
                        <div class="col-sm-2 col-2 text-center">
                          <h5><b><i>Total Stock</i></b></h5>
                        </div>
                        <div class="col-sm-3 col-3 text-center">
                          <h5><b><i>Date Stocked</i></b></h5>
                        </div>


                        <div class="col-sm-12 col-12">
                            <hr class="bg-dark">
                        </div>
                        <?php 
                        $mids=$rows['id'];
                        $hist="SELECT * FROM stock WHERE m_id = '$mids' ORDER BY posted DESC";
                        $res=$conn->query($hist);
                        while ($rowss=$res->fetch_assoc()) {
                         $d = strtotime($rowss['mdate']);
                         $e = strtotime($rowss['exdate']);
                         $f = strtotime($rowss['posted']);

                         $ds = date("M d, Y",$d);
                         $fs = date("M d, Y",$f);
                         $es = date("M d, Y",$e);
                        ?>

                        <div class="col-sm-3 col-2">
                          <label><b><i><?php echo $ds.' - '.$es; ?></i></b></label>
                        </div>
                        <div class="col-sm-2 col-2">
                          <label><b><i><?php echo $rowss['laststock']; ?></i></b></label>
                        </div>
                        <div class="col-sm-2 col-2">
                          <label><b><i><?php echo $rowss['addstock']; ?></i></b></label>
                        </div>
                        <div class="col-sm-2 col-2">
                          <label><b><i><?php echo $rowss['newstock']; ?></i></b></label>
                        </div>
                        <div class="col-sm-3 col-3">
                          <label><b><i><?php echo $fs; ?></i></b></label>
                        </div>
                        <div class="col-sm-12 col-12">
                            <hr class="bg-dark">
                        </div>
                        <?php } ?>
                        
                      </div><!--row-->
              
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
         <div class="modal fade" id="deleteinventory<?php echo $rows['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Delete Inventory</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">



                <h3>Are you sure you want to remove <b><i><?php echo $rows['meds']; ?></i></b> ?</h3>







            </div>
            <div class="modal-footer bg-gradient-red justify-content-between">
              <a type="button" href="includes/deleteinventory.php?id=<?php echo $rows['id']; ?>" class="btn bg-gradient-blue">Remove Category</a>
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
        <div class="modal fade" id="addinventory">
        <div class="modal-dialog">
          <div class="modal-content" style="width:600px;">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-plus"></i> Add Medicine/Drugs</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="includes/saveinventory.php" method="POST">
                  <div class="form-group">
                    <label placeholder="select">Main Category:</label>
                    <select name="maincat" class="form-control form-control-lg" value= "<?php echo $rows['maincat'];?>">
                      <option></option>
                      <?php 
                      $getcat = "SELECT * FROM maincategory";
                      $rgetcat = $conn->query($getcat);
                      while ($rowcat = $rgetcat->fetch_assoc()) {
                      
                      
                      ?>
                      <option><?php echo $rowcat['maincat'];?></option>
                     <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Sub-Category:</label>
                    <select name="subcat" class="form-control form-control-lg" value="<?php echo $rows['subcat'];?>">
                      <option></option>
                      <?php 
                      $getsub = "SELECT * FROM subcategory";
                      $rgetsub= $conn->query($getsub);
                      while ($rowsub= $rgetsub->fetch_assoc()) {
                      ?>
                      <option><?php echo $rowsub['subcat'];?></option>
                     <?php } ?>
                    </select>
                  </div>                
                 
                  <div class="form-group">
                    <label>Name of Medicine/Drugs:</label>
                    <input type="text" name="meds" class="form-control form-control-lg" >
                  </div>                  
                  <div class="form-group">
                    <label>Manufactured Date:</label>
                    <input type="date" name="mdate" class="form-control form-control-lg">
                  </div>                  
                  <div class="form-group">
                    <label>Expiration Date:</label>
                    <input type="date" name="exdate" class="form-control form-control-lg">
                  </div>                  
                  <div class="form-group">
                    <label>Stock:</label>
                    <input type="number" name="stock" class="form-control form-control-lg">
                  </div>   
                  <div class="form-group">
                    <label>Original Price:</label>
                    <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>
                  </div>
                    <input type="number" step="any"  name="origprice" class="form-control form-control-lg" >
                  </div>                 
                  <div class="form-group">
                    <label>Selling Price:</label>
                    <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>
                  </div>
                    <input type="number" step="any" name="sellprice" class="form-control form-control-lg">
                  </div>                  
                  <div class="form-group">
                    <label>Auth:</label>
                    <input type="text" name="auth" class="form-control form-control-lg" ><br>


                  <div class="form-group">
                    <button class="btn bg-gradient-blue btn-block" type="submit" name="saveinventory">SAVE MEDICINE</button>
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
                      <div class="modal fade" id="addstock">
        <div class="modal-dialog">
          <div class="modal-content" style="width:600px;">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-plus"></i> Add Medicine/Drugs</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="includes/saveinventory.php" method="POST">.0                 
                  <div class="form-group">
                    <label>Name of Medicine/Drugs:</label>
                    <input type="text" name="meds" class="form-control form-control-lg" >
                  </div>                  
                  <div class="form-group">
                    <label>Manufactured Date:</label>
                    <input type="date" name="mdate" class="form-control form-control-lg">
                  </div>                  
                  <div class="form-group">
                    <label>Expiration Date:</label>
                    <input type="date" name="exdate" class="form-control form-control-lg">
                  </div>                  
                  <div class="form-group">
                    <label>Stock:</label>
                    <input type="number" name="stock" class="form-control form-control-lg">
                  </div>   
                  <div class="form-group">
                    <label>Original Price:</label>
                    <input type="number"  name="origprice" class="form-control form-control-lg" >
                  </div>                 
                  <div class="form-group">
                    <label>Selling Price:</label>
                    <input type="number" name="sellprice" class="form-control form-control-lg">
                  </div>                  
                  <div class="form-group">
                    <label>Auth:</label>
                    <input type="text" name="auth" class="form-control form-control-lg" ><br>


                  <div class="form-group">
                    <button class="btn bg-gradient-blue btn-block" type="submit" name="saveinventory">SAVE MEDICINE</button>
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
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
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