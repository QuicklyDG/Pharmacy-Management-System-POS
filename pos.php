
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
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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

 <?php include("includes/staff.navbar.php"); ?>
 <?php include("includes/staff.sidebar.php"); ?>

 <?php
 include("includes/conn.php");
 error_reporting(0);
 $query = "SELECT invoice_id FROM final_sales ORDER BY invoice_id DESC";
 $result = $conn->query($query);
 $row = $result->fetch_assoc();
 $lastid = $row['invoice_id'];
 if (empty($lastid)) {
     $number = "E-0000001";
 } else {
     $idd = str_replace("E-", "", $lastid);
     $id = str_pad($idd + 1, 7, 0, STR_PAD_LEFT);
     $number = 'E-' . $id;
 }
        ?>

<?php 
  $purchase="SELECT SUM(subtotal) AS purchase FROM sales WHERE invoice_id='$number'";
  $res=$conn->query($purchase);
  $rows2=$res->fetch_assoc();
  $ptotal=$rows2['purchase'];
                                
                                ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Zarcy Drugstore | Point of Sales</h1>
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

        <div class="row">

            <div class="col-sm-5">

            <div class="card">
                <div class="card-header bg-gradient-red">
                    <h4><i class="fa fa-calculator"></i> Point of Sale</h4>
                </div>
                <div class="card-body">
                  <form action="includes/addprod.php" method="POST">
                    <div class="form-group">
                        <label>Invoice</label>
                        <input type="text" name="invoice" class="form-control form-control-lg" value="<?php echo $number; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label placeholder="select">Drugs/Medicine</label>
                        <select class="form-control form-control-lg select2bs4" data-placement="bottom" name="drugs" style="width: 100%;" required>
                                                <option selected="selected" autofocus></option>
                                                <?php
                                                include("includes/conn.php");
                                               
                                                $check2 = "SELECT * FROM inventory WHERE stock!=0 ORDER BY meds ASC";
                                                $rcheck2 = $conn->query($check2);
                                                while ($rows2 = $rcheck2->fetch_assoc()) {
                                                   


                                                ?>
                                                    <option style="text-transform: capitalize; font-weight: bold;" value="<?php echo $rows2['meds']; ?>">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                        <b><?php echo $rows2['meds'];?></b> | ₱<p class='text-danger'><?php echo number_format($rows2['sellprice'], 2); ?></p>
                                                          
                                                        </div>|
                                                        <div class="col-sm-4">
                                                            Stock: <?php echo $rows2['stock']; ?>
                                                        </div>|
                                                        <div class="col-sm-4">
                                                            Prescription: <?php echo $rows2['auth']; ?>
                                                        </div>
                                                    </div>
                                                       

                                                    </option>
                                                <?php } ?>
                                            </select>
                    </div>
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="qty" class="form-control form-control-lg" min="1" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="adddrugs" class="btn bg-gradient-blue btn-block">ADD PRODUCT</button>
                    </div>
                  </form>
                </div>
            </div>

            </div>
            <div class="col-sm-7">

            <div class="card" style="height: 450px;">
                <div class="card-header bg-gradient-red">
                    <h4><i class="fa fa-list"></i> Invoice</h4>
                </div>
                <div class="card-body" style="height: 400px; overflow-x:scroll;">
                <div class="row">
                  <div class="col-sm-6">
                  <h4>Total: ₱ <b><?php echo number_format($ptotal, 2); ?></b></h4>
                  </div>
                  <div class="col-sm-6">
                    <button class="btn bg-gradient-green btn-block" data-toggle="modal" data-target="#payment"><i class="fa fa-calculator"></i> PROCESS PAYMENT</button>
                  </div>
                </div>
                   
                        <table id="example3" class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>Qty</th>
                                    <th>Products</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                              <?php 
                              $gsales="SELECT * FROM sales WHERE invoice_id='$number' ORDER BY id DESC";
                              $rgsales=$conn->query($gsales);
                              while ($rowss=$rgsales->fetch_assoc()) {
                               

                                $subtotal = number_format($rowss['sellprice'] * $rowss['qty'], 2);
                              
                              ?>
                                <tr>
                                    <td><?php echo $rowss['qty']; ?></td>
                                    <td><?php echo $rowss['meds'].' - ₱ '.$rowss['sellprice']; ?> <button class="text-success" style="border:0px; background-color:transparent;" data-toggle="modal" data-target="#edit<?php echo $rowss['id']; ?>"><i class="fa fa-pen"></i></button> <button class="text-danger" style="border:0px; background-color:transparent;" data-toggle="modal" data-target="#cancel<?php echo $rowss['id']; ?>"><i class="fa fa-trash"></i></button></td>
                                    <td>₱ <?php echo $subtotal; ?></td>
                                  
                                </tr>

                                <!-- modal -->
                    <div class="modal fade" id="edit<?php echo $rowss['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-edit"></i> Update Quantity</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

           
                <form action="includes/editpurchase.php?id=<?php echo $rowss['id']; ?>" method="POST">

                  <div class="form-group">
                    <label>Quantity for <?php echo $rowss['meds']; ?></label>
                    <input type="number" name="qty2" class="form-control form-control-lg" value="<?php echo $rowss['qty']; ?>">
                    <input type="hidden" name="qty" value="<?php echo $rowss['qty']; ?>">
                  </div>

                  <div class="form-group">
                    <button type="submit" name="purchase" class="btn bg-gradient-green btn-block"> UPDATE PURCHASE</button>
                  </div>

                </form>


            </div>
            <div class="modal-footer bg-gradient-red justify-content-between">
              <!-- <a type="button" href="includes/deleteinventory.php?id=<?php echo $rows['id']; ?>" class="btn bg-gradient-blue">Remove Category</a>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> -->

            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
       <!-- modal -->
       <div class="modal fade" id="cancel<?php echo $rowss['id']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-trash"></i> Cancel Purchase</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

           

                <h3>Are you sure you want to cancel <b><i><?php echo $rowss['meds']; ?></i></b> from the purchase?</h3>

            


            </div>
            <div class="modal-footer bg-gradient-red justify-content-between">
              <a type="button" href="includes/cancelpurchase.php?id=<?php echo $rowss['id']; ?>" class="btn bg-gradient-blue">Cancel Purchase</a>
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
                              <tr>
                                <td colspan="2" class="text-right">TOTAL:</td>
                              
                                <td>₱ <b><?php echo number_format($ptotal, 2); ?></b></td>
                              </tr>
                            </tbody>
                        </table>

                       
                       

                         <!-- modal -->
               <div class="modal fade" id="payment">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-gradient-red">
              <h4 class="modal-title"><i class="fa fa-calculator"></i> Process Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form action="includes/payment.php" method="POST">
                  <div class="form-group">
                    <label>Invoice ID</label>
                                
                    <input type="text" name="invoice" class="form-control form-control-lg" value="<?php echo $number;?>" readonly>
                  </div>

                  <div class="form-group">
                  <label>Total Bill:</label>  
                    <!-- <input type="hidden" name="total" id="total-bill2" value="<?php echo $ptotal; ?>"> -->
                    <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>
                  </div>
                    
                    <input id="totalBill" type="text" name="totals" class="form-control form-control-lg" value="<?php echo $ptotal; ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Discount:</label>
                    <select name="discount" id="discount-select" class="form-control form-control-lg" onchange="applyDiscount()">
                    <option></option>        
                      <option value=".20">Senior Citizen</option> 
                    </select>
                  </div>
                  

                  <div class="form-group">
                    <label>Customer Payment:</label>
                    <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>
                  </div>         
                    <!-- <input id="custPayment" type="number" step="any" min="<?php echo $ptotal; ?>" name="cuspay" class="form-control form-control-lg" required> -->
                    <input id="custPayment" type="number" step="any" name="cuspay" class="form-control form-control-lg" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Change:</label>
                    <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>
                  </div> 
                    <input id="custChange" type="number" class="form-control form-control-lg" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn bg-gradient-blue btn-block" type="submit" name="processpay">PROCEED</button>
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
            </div>

            </div>

        </div> <!--row-->

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
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
   const totalBill = document.querySelector('#totalBill ')
   const paymentEl = document.querySelector('#custPayment')
   const paymentEl2 = document.querySelector('#discount')
  const changeEl = document.querySelector('#custChange')


  paymentEl.addEventListener('keyup', (e) => {
    changeEl.value = parseFloat(paymentEl.value) - parseFloat(totalBill.value)
  })

 
 
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
    $('#example3').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });

$(document).ready(function(){
  $('[rel="tooltip"]').tooltip();
});

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End


 
 

</script>
<script>
		function applyDiscount() {
    // get the selected value of the dropdown
    var discountPercentage = parseFloat(document.getElementById("discount-select").value);

    // get the total bill element
    var totalBillElement = document.getElementById("totalBill");

    // get the value of the total bill
    var totalBillValue = parseFloat(totalBillElement.value);

    // calculate the discount amount
    var discountAmount = totalBillValue * discountPercentage;

    // apply the discount
    var discountedBillValue = totalBillValue - discountAmount;

    // update the total bill element with the discounted value
    totalBillElement.value = discountedBillValue.toFixed(2);
}

	</script>
</body>
</html>
