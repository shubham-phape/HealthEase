<?php
include 'connect.php';
if (isset($_POST['submit'])){
session_start();
$fname  = $_POST['fname'];
$lname  = $_POST['lname'];
$dob  = $_POST['dob'];
$height = $_POST['height'];
$weight  = $_POST['weight'];
$race  = $_POST['race'];
$address  = $_POST['address'];
$ip = $_POST['ip'];
$id = $_SESSION['id'];
echo "fname is ".$fname." lname is ".$lname." dob is ".$dob." height is ".$height." weight is ".$weight." id is ".$id." race is ".$race." address is ".$address." initial problem is".$ip;
//insert query
$result = $mysqli->query("INSERT INTO patient_details(pid, id, fname, lname, dob, height, weight, race, address, ckd, status, initial_problem) VALUES ('',$id,'$fname','$lname','$dob',$height,$weight,'$race','$address','Not Available','Not Available', '$ip')");
$result1 = $mysqli->query("UPDATE login_details SET register=1 WHERE id=$id");
if ($result && $result1) {
header("Location: Patient_dashboard.php");
}
else{
echo $mysqli->error;
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | HealthEase</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <?php include 'patient_header.php'; ?>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php include 'patient_sidebar.php';?>
        <!-- /.sidebar -->
      </aside>
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Home page
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>
        <section class="content">
          <br><br>
          <div class="row">
            <!-- left column -->
            <div class="col-md-6 col-xs-12   col-md-offset-3">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="Patient_details.php" method="post">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputName">First Name</label>
                      <input type="text" name="fname" class="form-control" id="" placeholder="Enter Full Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName">Last Name</label>
                      <input type="text" name="lname" class="form-control" id="" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                      <label>Date of Birth:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="dob" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                      </div>
                      <!-- /.input group -->
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName">Height</label>
                      <input type="text" name="height" class="form-control" id="" placeholder="Enter Height (cm)">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName">Weight</label>
                      <input type="text" name="weight" class="form-control" id="" placeholder="Enter Weight (kg)">
                    </div>
                    <div class="form-group">
                      <label>Race(Body Color)</label>
                      <select class="form-control" name="race">
                        <option selected="selected" value="black" selected>Black</option>
                        <option value="white">White</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <textarea name="address" class="form-control" rows="3" placeholder="Enter Address..."></textarea>
                    </div>
                    <div class="form-group">
                      <label>Initial Problems</label>
                      <input type="text" name="ip" class="form-control" placeholder="ex: headache, fever, jaundice" />
                    </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <center><button type="submit" name="submit" class="btn btn-lg btn-primary">Submit</button></center>
                  </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
          </div>
          
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div>
        <strong>Copyright &copy; 2018-2020 HealthEase<strong> All rights
        reserved.
      </footer>
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- date-range-picker -->
    <script src="../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
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
    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )
    //Date picker
    $('#datepicker').datepicker({
    autoclose: true
    })
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass   : 'iradio_flat-green'
    })
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()
    //Timepicker
    $('.timepicker').timepicker({
    showInputs: false
    })
    })
    </script>
  </body>
</html>