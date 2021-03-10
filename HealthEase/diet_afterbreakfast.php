<!DOCTYPE html>
<?php
session_start();
include 'connect.php';

$currentsession_id=$_SESSION['id'];
$kflag=0;
$getidquery=mysqli_query($mysqli,"SELECT pid FROM patient_details WHERE id=$currentsession_id");
$t=mysqli_fetch_array( $getidquery );
$userid=$t['pid'];

$query=mysqli_query($link,"SELECT * FROM todays_breakfast WHERE user_id=$userid")or die("Error: ".mysqli_error($link));
$previous=mysqli_fetch_array( $query );
$itemid=$previous['item_id'];
$query1=mysqli_query($link," SELECT * FROM  breakfast WHERE item_id=$itemid")or die("Error: ".mysqli_error($link));
$result1 = mysqli_fetch_array( $query1 );
$servings=5;
$result1['quantity_protein']=number_format($result1['quantity_protein']/$servings,2);
$result1['quantity_calcium']=number_format($result1['quantity_calcium']/$servings,2);
$result1['quantity_phosphorus']=number_format($result1['quantity_phosphorus']/$servings,2);
$result1['quantity_potassium']=number_format($result1['quantity_potassium']/$servings,2);
$result1['quantity_sodium']=number_format($result1['quantity_sodium']/$servings,2);
$result1['quantity_magnesium']=number_format($result1['quantity_magnesium']/$servings,2);
if (isset($_POST['removemeal'])) {
$query12=mysqli_query($link,"UPDATE todays_breakfast  SET item_id='-1', meal_status='0' WHERE user_id=$userid");
if($query12)
{
$qprogress=mysqli_query($link,"SELECT * FROM dietprogress WHERE user_id=$userid")or die('Error, query failed');
  $progres=mysqli_fetch_array($qprogress);
  $confirmdish=$result1;
  if($progres!=NULL)
  {

  //the updation of nutrients is done here
  $nutrient=array("0","0","0","0","0","0");
  $nutrient[0]=$progres['progress_protein']-$confirmdish['quantity_protein'];
  $nutrient[1]=$progres['progress_calcium']-$confirmdish['quantity_calcium'];
  $nutrient[2]=$progres['progress_potassium']-$confirmdish['quantity_potassium'];
  $nutrient[3]=$progres['progress_sodium']-$confirmdish['quantity_sodium'];
  $nutrient[4]=$progres['progress_magnessium']-$confirmdish['quantity_magnesium'];
  $nutrient[5]=$progres['progress_phosphorus']-$confirmdish['quantity_phosphorus'];
  $progupdate=mysqli_query($link,"UPDATE dietprogress SET  progress_protein=$nutrient[0],progress_calcium=$nutrient[1],progress_potassium=$nutrient[2],progress_sodium=$nutrient[3],progress_magnessium=$nutrient[4],progress_phosphorus=$nutrient[5]  WHERE user_id=$userid")or die("Error: ".mysqli_error($link));
  header("Location: diet_breakfast.php");
  exit();
  
  }
  }
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
          Diet Reccomendation
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Diet</a></li>
            <li class="active">Breakfast Diet</li>
          </ol>
        </section>
        <!-- Main content -->
        <section  class="content">
          
          <!-- Default box -->
          <div class="box-body no-padding">
            <div class="row">
              <div  class="col-md-12">
                <div class="box">
                  <div class="box">
                    <div class="box-header with-border">
                      <div align="center" class="box-body no-padding">
                        <h3>Your todays added breakfast </h3>
                      </div>
                    </div><br>
                    <div class="form-group" align="center">
                      <?php
                      echo "
                      <img src={$result1['recipe_image']} height=150>
                      ";
                      ?>
                    </div>
                    <div  class="form-group" align="center">
                      <?php
                      echo "
                      <label>{$result1['recipe_name']}</label>
                      ";
                      ?>
                    </div>
                    <div  class="form-group" align="center">
                      You can remove this meal from todays diet.
                    </div>
                    <div  class="form-group" align="center">
                      <form action"index.php" method="post">
                        <input type="submit" name="removemeal" class="btn btn-primary" value="Remove this meal ">
                      </form>
                      
                    </div>
                    <br>
                  </div>
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