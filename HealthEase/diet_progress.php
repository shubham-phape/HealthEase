<!DOCTYPE html>
<?php
session_start();
include 'connect.php';
error_reporting(E_ERROR | E_PARSE);/*
$link = mysqli_connect("localhost", "root", "", "foods");
if($link){
//echo "done";
}*/
$currentsession_id=$_SESSION['id'];

$getidquery=mysqli_query($mysqli,"SELECT pid FROM patient_details WHERE id=$currentsession_id");
$t=mysqli_fetch_array( $getidquery );
$userid=$t['pid'];
$qprogress=mysqli_query($link,"SELECT * FROM dietprogress WHERE user_id=$userid")or die('Error, query failed');
$progres=mysqli_fetch_array($qprogress);
if($progres!= NULL)
$percent=array("0","0","0","0","0","0");{
$percent[0]=  ($progres['progress_protein']/$progres['goal_protien'])*100;
$percent[1]=  ($progres['progress_calcium']/$progres['goal_calcium'])*100;
$percent[2]=  ($progres['progress_potassium']/$progres['goal_potassium'])*100;
$percent[3]=  ($progres['progress_sodium']/$progres['goal_sodium'])*100;
$percent[4]=  ($progres['progress_magnessium']/$progres['goal_magnessium'])*100;
$percent[5]=  ($progres['progress_phosphorus']/$progres['goal_phosphorus'])*100;
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HealthEase | Patient Dashboard</title>
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
      <body>
        
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            
            <h1>
            Diet Recommendation
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Diet</a></li>
              <li class="active">Progress</li>
            </ol>
          </section>
          
          
          <section  class="content">
            <div class="row">
              <div  class="col-md-12">
                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Today's Intake</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered">
                      <tr>
                        <th style="width: 10px">#</th>
                        <th >Intake</th>
                        <th style="width: 500px">Progress</th>
                        <th style="width: 40px">Percent</th>
                      </tr>
                      <tr>
                        <td>1.</td>
                        <td>Protein</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $percent[0] ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($percent[0]) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>2.</td>
                        <td>Calcium</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-yellow" style="width: <?php echo $percent[1] ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-yellow"><?php echo round($percent[1]) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>3.</td>
                        <td>Potassium</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-blue" style="width: <?php echo $percent[2] ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-blue"><?php echo round($percent[2]) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td>Sodium</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-success" style="width: <?php echo $percent[3] ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-green"><?php echo round($percent[3]) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>5.</td>
                        <td>Magnesium</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-danger" style="width: <?php echo $percent[4] ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-red"><?php echo round($percent[4]) ?>%</span></td>
                      </tr>
                      <tr>
                        <td>6.</td>
                        <td>Phosphorus</td>
                        <td>
                          <div class="progress progress-xs progress-striped active">
                            <div class="progress-bar progress-bar-blue" style="width: <?php echo $percent[5] ?>%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-blue"><?php echo round($percent[5]) ?>%</span></td>
                      </tr>
                    </table>
                  </div></div>
                  
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