<!DOCTYPE html>
<?php
session_start();
error_reporting(0);
  include 'connect.php';
  $currentsession_id=$_SESSION['id'];
   
   $getidquery=mysqli_query($mysqli,"SELECT pid FROM patient_details WHERE id=$currentsession_id");
    $t=mysqli_fetch_array( $getidquery );
    $userid=$t['pid'];

 $getreport=mysqli_query($mysqli,"SELECT * FROM reports WHERE pid=$userid");
$report=mysqli_fetch_array($getreport);

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lab Report | HealthEase</title>
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
          Lab Reports
          </h1>
          <ol class="breadcrumb">
            <li><a href="Patient_dashboard.html"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-bar-chart"></i> Lab Report</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="row">
            <div class="col-md-6 col-xs-12 col-md-offset-3">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Your Laboratory Report</h3>
                </div>
                <div class="box-body">
                <div class="form-group"><h4><label>Blood Pressure: <i><?php echo "{$report['bp']}"?> mm/Hg</i></label></h4></div>
                <div class="form-group"><h4><label>Specific Gravity: <i><?php echo "{$report['sg']}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Albumin: <i><?php echo "{$report['al']}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Sugar: <i><?php echo "{$report['su']}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Red Blood Cell: <i>
                  <?php 
                    if($report['rbc']==1)
                      $rbcstate = 'Normal';
                    elseif($report['rbc']==0)
                      $rbcstate = 'Abnormal';
                    else
                      $rbcstate = 'No Entry';
                    echo "{$rbcstate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Pus Cell: <i>
                  <?php 
                    if($report['pc']==1)
                      $pcstate = 'Normal';
                    elseif($report['pc']==0)
                      $pcstate = 'Abnormal';
                    else
                      $pcstate = 'Not Present';
                  echo "{$pcstate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Pus Cell Clumps: <i>
                  <?php 
                    if($report['pcc']==1)
                      $pccstate = 'Present';
                    else
                      $pccstate = 'Not-Present';
                  echo "{$pccstate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Bacteria: <i>
                  <?php 
                    if($report['ba']==1)
                      $bastate = 'Present';
                    else
                      $bastate = 'Not-Present';
                  echo "{$bastate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Blood Glucose Random: <i><?php echo "{$report['bgr']}"?> mgs/dl </i></i></label></h4></div>
                <div class="form-group"><h4><label>Blood Urea: <i><?php echo "{$report['bu']}"?> mgs/dl </i></label></h4></div>
                <div class="form-group"><h4><label>Serum Creatinine: <i><?php echo "{$report['sc']}"?> mgs/dl </i></label></h4></div>
                <div class="form-group"><h4><label>Sodium: <i><?php echo "{$report['sod']}"?> mEq/L </i></label></h4></div>
                <div class="form-group"><h4><label>Potassium: <i><?php echo "{$report['pot']}"?> mEq/L </i></label></h4></div>
                <div class="form-group"><h4><label>Hemoglobin: <i><?php echo "{$report['hemo']}"?> gms </i></label></h4></div>
                <div class="form-group"><h4><label>Packed Cell Volume: <i><?php echo "{$report['pcv']}"?></i></label></h4></div>
                <div class="form-group"><h4><label>White Cell Blood Count: <i><?php echo "{$report['wbcc']}"?>cells/cumm </i></label></h4></div>
                <div class="form-group"><h4><label>Red Cell Blood Count: <i><?php echo "{$report['rbcc']}"?> millions/cmm</i></label></h4></div>
                <div class="form-group"><h4><label>Hypertension: <i>
                  <?php 
                    if($report['htn']==1)
                      $htnstate = 'Yes';
                    elseif($report['htn']==0)
                      $htnstate = 'No';
                    else
                      $htnstate = 'No Entry';
                  echo "{$htnstate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Diabetes Mellitus: <i>
                  <?php 
                    if($report['dm']==1)
                      $dmstate = 'Yes';
                    else
                      $dmstate = 'No';
                  echo "{$dmstate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Coronary Artery Disease: <i>
                  <?php 
                    if($report['cad']==1)
                      $cadstate = 'Yes';
                    else
                      $cadstate = 'No';
                  echo "{$cadstate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Appetite: <i>
                  <?php 
                    if($report['appet']==1)
                      $appetstate = 'Good';
                    elseif($report['appet']==0)
                      $appetstate = 'Bad';
                    else
                      $appetstate = 'No Entry';
                  echo "{$appetstate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Pedal Edema: <i>
                  <?php 
                    if($report['pe']==1)
                      $pestate = 'Yes';
                    elseif ($report['pe']==0)
                      $pestate = 'No';
                    else
                      $pestate = 'No Entry';
                  echo "{$pestate}"?></i></label></h4></div>
                <div class="form-group"><h4><label>Anemia: <i>
                  <?php 
                    if($report['ane']==1)
                      $anestate = 'Yes';
                    elseif ($report['ane']==0)
                      $anestate = 'No';
                    else
                      $anestate = 'No Entry';
                  echo "{$anestate}"?></i></label></h4></div>
              </div>
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
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Morris.js charts -->
    <script src="../../bower_components/raphael/raphael.min.js"></script>
    <script src="../../bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
    $(document).ready(function () {
    $('.sidebar-menu').tree()
    })
    </script>
  </body>
</html>