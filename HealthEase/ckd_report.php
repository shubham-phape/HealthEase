<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CKD Report | HealthEase</title>
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
          CKD Report
          </h1>
          <ol class="breadcrumb">
            <li><a href="Patient_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="active"><i class="fa fa-book"></i> CKD Report</a></li>
          </ol>
        </section>
        <div class="pad margin no-print">
          <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            This page has been enhanced for printing. Click the print button at the bottom of the Page to Download PDF.
          </div>
        </div>
        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
              <!--               <i class="fa fa-globe"></i> Chronic Kidney Disease Report.-->
              <a class="logo">
                <!-- logo for regular state and mobile devices -->
                <h1><span class="logo-lg"><b>Health</b>Ease</span></h1>
              </a>
              <medium><i>Chronic Kidney Disease Report</i></medium>
              <medium class="pull-right"><i>Date: 2/10/2014</i></medium>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Patient Information</b>
              <address>
                Patient Name <?php echo $fname." ".$lname; ?><br>
                ID #<?php echo $pid; ?>
              </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <b>Assistant Information</b>
              <?php
              if ($result = $mysqli->query('SELECT * FROM hierarchy_ass_pat WHERE pid = "'.$pid.'"')) {
                $aid = $result->aid;
              }
              ?>
              <address>
                Assistant Name<br>
                Assistant ID <?php echo $aid; ?>
              </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>CKD Report #007612</b><br>
              Patient Join Date<br>
              Report Date
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- Table row -->
          <div class="row">
            <div class="col-md-6 col-xs-12 table-responsive">
              <div class="header">
                <h4 class="box-title" style="color: #21618C;">Laboratory Findings</h4>
              </div>
              <!-- /.box-header -->
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>BP</th>
                    <td>1 <small>(mm/Hg)</small></td>
                  </tr>
                  <tr>
                    <th>SG</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>AL</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>SU</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>RBC</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>PC</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>PCC</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>Ba</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>BGR</th>
                    <td>1 <small>(mgs/dl)</small></td>
                  </tr>
                  <tr>
                    <th>BU</th>
                    <td>1 <small>(mgs/dl)</small></td>
                  </tr>
                  <tr>
                    <th>SC</th>
                    <td>1 <small>(mgs/dl)</small></td>
                  </tr>
                  <tr>
                    <th>SOD</th>
                    <td>1 <small>(mEq/L)</small></td>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.col -->
            <div class="col-md-6 col-xs-12 table-responsive">
              <div class="header">
                <h4 class="box-title" style="color: #21618C;" >Laboratory Finding</h4>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>POT</th>
                    <td>1 <small>(mEq/L)</small></td>
                  </tr>
                  <tr>
                    <th>HEMO</th>
                    <td>1 <small>(gms)</small></td>
                  </tr>
                  <tr>
                    <th>PCV</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>WBCC</th>
                    <td>1 <small>(cells/cumm)</small></td>
                  </tr>
                  <tr>
                    <th>RBCC</th>
                    <td>1 <small>(millions/cmm)</small></td>
                  </tr>
                  <tr>
                    <th>HTN</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>DM</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>CAD</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>APPET</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>PE</th>
                    <td>1</td>
                  </tr>
                  <tr>
                    <th>ANE</th>
                    <td>1</td>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <!-- accepted payments column -->
            <div class="col-md-4 col-xs-12">
              <h4 style="color: #21618C;">Physical Examination:</h4>
              Blood Pressure:<br>
              Albumin:<br>
              Sugar:<br>
              Bacteria:<br>
              Hemoglobin:<br>
              Hypertension:<br>
              Anemia:<br>
            </div>
            <div class="col-md-4 col-xs-12">
              <h4 style="color: #21618C;">Initial Problem List</h4>
            </div>
            <div class="col-md-4 col-xs-12">
              <h4 style="color: #21618C;">Revised Problem List</h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="header">
                <h4 class="box-title" style="color: #21618C;">HealthEase System Report:</h4>
              </div>
              <p>From all the laboratory reports and patient symptoms, the system has detected that Patient is having CHRONIC KIDNEY DISEASE.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xs-12">
              <div class="header">
                <h4 class="box-title" style="color: #21618C;">Glomerular Filtration Rate(GFR):</h4>
              </div>
              <div class="demo">
                <center><input class="knob" data-min="0" data-displayPrevious=true data-max="1000" value="" data-fgColor="#f56954"><br>
                <label><h3>Patient is detected with <?php echo $stage; ?></h3></label></center>
              </div>
            </div>
            <div class="col-md-6 col-xs-12">
              <div class="header">
                <h4 class="box-title" style="color: #21618C;">Recommended Diet:</h4>
              </div>
              
            </div>
          </div>
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="ckd_report_print.php" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Print</a>
              <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
              </button> -->
              <!-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"> -->
              <!-- <i class="fa fa-download"></i> Generate PDF -->
              </button>
            </div>
          </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b>
        </div>
        <strong>Copyright &copy; 2018-2020 HealthEase<strong> All rights
        reserved.
      </footer>
      <!-- Control Sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- jQuery Knob -->
    <script src="../../bower_components/jquery-knob/js/jquery.knob.js"></script>
    <!-- Sparkline -->
    <script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script>
    $(function() {
    $('.knob').knob();
    });
    var initval = "<?php echo $gfr; ?>";
    $({value: 0}).animate({value: initval}, {
    duration: 1000,
    easing:'swing',
    step: function()
    {
    $('.knob').val(this.value).trigger('change');
    $('#preval').val(initval);
    }
    });
    </script>
  </body>
</html>