<?php 
include 'connect.php';
//session_start();
$result = $mysqli->query('SELECT MAX(rid) as rid from reports');
if($result) {
  $row = $result->fetch_assoc();
  $maxrid = $row['rid']+1;
  //echo $maxrid;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prediction | HealthEase</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- Dashboard Style -->
    <link rel="stylesheet" href="../../dist/css/dashborad_box.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="getPid.js"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>H</b>E</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Health</b>Ease</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../dist/img/user3-128x128.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Assistant</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                    <p>
                      Sarrah Todd - Assistant
                      <small>Member since Nov. 2018</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Sarrah Todd</p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i> <span>CKD Prediction</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#><i class="fa fa-circle-o"></i> Prediction</a></li>
                <li><a href="Patient_reports_for_assistant.php"><i class="fa fa-circle-o"></i> Patient Report</a></li>
              </ul>
            </li>
            <li>
              <a href="Stage_calculation.php">
                <i class="fa fa-bar-chart"></i> <span>CKD Stage Calculation</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i> <span>Diet</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="diet_breakfast.php"><i class="fa fa-circle-o"></i> Breakfast Diet</a></li>
                <li><a href="diet_lunch.php"><i class="fa fa-circle-o"></i> Lunch Diet</a></li>
                <li><a href="diet_dinner.php"><i class="fa fa-circle-o"></i> Dinner Diet</a></li>
                <li><a href="diet_progress.php"><i class="fa fa-circle-o"></i> Track  Diet  Progress</a></li>

              </ul>
            </li>
            <li class="treeview">
              <a href="Make Appoinment.html">
                <i class="fa fa-phone"></i> <span>Make Appointment</span>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="Patient_dashboard.html"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Prediction</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8  col-xs-12 col-md-offset-2">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Prediction Details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form id="my-form" action = "http://localhost:5000/prediction_model" method = "post">
                  <div class="box-body">
                    <input type="hidden" name="rid" value="<?php echo $maxrid ?>">
                    <div class="form-group col-md-12">
                      <label>Patient Name:</label>
                      <select name="pid" id="details" class="form-control">
                        <option value="" selected="selected">Select Name</option>
                        <?php
                          $result = $mysqli->query('select * from patient_details');
                          if ($result) {
                             while ($object = $result->fetch_object()){
                              echo '<option value="'.$object->pid.'">'.$object->fname.' '.$object->lname.'</option>';
                             }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Age <small>(in years)</small></label>
                      <input name="age" id="age" class="form-control" type ="text" readonly />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Blood Pressure <small>(in mm/Hg)</small></label>
                      <input name="bp" class="form-control" type ="text" value="80" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Specific gravity </label>
                      <select name="sg" class="form-control">
                        <option value="1.005">1.005</option>
                        <option value="1.010">1.010</option>
                        <option value="1.015">1.015</option>
                        <option value="1.020">1.020</option>
                        <option value="1.025">1.025</option>
                        <option value="1.017">1.017 <small>(if not present)</small></option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Albumin</label>
                      <!-- <input name="al" class="form-control" type ="text" value="1" /> -->
                      <select name="al" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Sugar</label>
                      <!-- <input name="su" class="form-control" type ="text" value="0" /> -->
                      <select name="su" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="0.4">0.4 <small>(if not present)</small></option>

                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Red blood cell</label>
                      <!-- <input name="rbc" class="form-control" type ="text" value="0.8" /> -->
                      <select name="rbc" class="form-control">
                        <option value="1">Normal</option>
                        <option value="0">Abnormal</option>
                        <option value="0.8">Not present</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Pus cell</label>
                      <!-- <input name="pc" class="form-control" type ="text" value="1" /> -->
                      <select name="pc" class="form-control">
                        <option value="1">Normal</option>
                        <option value="0">Abnormal</option>
                        <option value="0.7">Not present</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Pus cell clumps</label>
                      <!-- <input name="pcc" class="form-control" type ="text" value="0" /> -->
                      <select name="pcc" class="form-control">
                        <option value="1">Present</option>
                        <option value="0">Not-Present</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Bacteria</label>
                      <!-- <input name="ba" class="form-control" type ="text" value="0" /> -->
                      <select name="ba" class="form-control">
                        <option value="1">Present</option>
                        <option value="0">Not-Present</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Blood glucose random <small>(in mgs/dl)</small></label>
                      <input name="bgr" class="form-control" type ="text" value="121" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Blood urea <small>(in mgs/dl)</small></label>
                      <input name="bu" class="form-control" type ="text" value="36" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Serum creatinine <small>(in mgs/dl)</small></label>
                      <input name="sc" class="form-control" type ="text" value="1.2" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Sodium <small>(in mEq/L)</small></label>
                      <input name="sod" class="form-control" type ="text" value="137.5" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Potassium <small>(in mEq/L)</small></label>
                      <input name="pot" class="form-control" type ="text" value="4.6" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Hemoglobin <small>(in gms)</small></label>
                      <input name="hemo" class="form-control" type ="text" value="15.4" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Packed cell volume</label>
                      <input name="pcv" class="form-control" type ="text" value="44" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>White blood cell count <small>(in cells/cumm)</small></label>
                      <input name="wbcc" class="form-control" type ="text" value="7800" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Red blood cell count <small>(in millions/cmm)</small></label>
                      <input name="rbcc" class="form-control" type ="text" value="5.2" />
                    </div>
                    <div class="form-group col-md-6">
                      <label>Hypertension</label>
                      <!-- <input name="htn" class="form-control" type ="text" value="1" /> -->
                      <select name="htn" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        <option value="0.3">Not present</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Diabetes mellitus</label>
                      <!-- <input name="dm" class="form-control" type ="text" value="1" /> -->
                      <select name="dm" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Coronary artery disease</label>
                      <!-- <input name="cad" class="form-control" type ="text" value="0" /> -->
                      <select name="cad" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Appetite</label>
                      <!-- <input name="appet" class="form-control" type ="text" value="1" /> -->
                      <select name="appet" class="form-control">
                        <option value="1">Good</option>
                        <option value="0">Poor</option>
                        <option value="0.7">Not present</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Pedal Edema</label>
                      <!-- <input name="pe" class="form-control" type ="text" value="0" /> -->
                      <select name="pe" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        <option value="0.1">Not present</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Anemia</label>
                      <!-- <input name="ane" class="form-control" type ="text" value="0" /> -->
                      <select name="ane" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        <option value="0.1">Not present</option>
                      </select>
                    </div>
                    <div class="box-footer">
                      <center><button type="submit" class="btn btn-primary" value="submit">Submit</button></center>
                    </div>
                  </div>
                </form>
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
  </body>
</html>