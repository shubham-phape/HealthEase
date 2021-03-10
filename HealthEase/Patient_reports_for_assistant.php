<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Patient Reports | HealthEase</title>
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
    <script type="text/javascript" src="getReport.js"></script>
    <style>
    .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
    }
    .example-modal .modal {
    background: transparent !important;
    }
    </style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <?php include 'assistant_header.php';?>
      <!-- =============================================== -->
      <!-- Left side column. contains the sidebar -->
      <?php include 'assistant_sidebar.php'; ?>
      <!-- =============================================== -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="Assistant_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Patient Reports</li>
          </ol>
        </section>
        <!-- Main content -->
        <!-- Default box -->
        <section class="content">
          <div class="row">
            <div class="col-md-12- col-xs-12">
              <div class="box-primary">
                <div class="box-header">
                  <h3 class="box-title">All Patients</h3>
                </div>
                <!-- /.box-header -->
                <div class="box">
                  <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Status</th>
                          <th>Report</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($result = $mysqli->query("SELECT pid,fname,lname,TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age,gender,status from patient_details")) {
                        while ($object = $result->fetch_object()) {
                        $pid = $object->pid;
                        $gender;
                        if ($object->gender == 1) {
                        $gender = 'Male';
                        }
                        else{
                        $gender = 'Female';
                        }
                        $status;
                        if ($object->status == 'approved') {
                        $status = '<span class="label label-success">Approved</span>';
                        }
                        if ($object->status == 'pending') {
                        $status = '<span class="label label-warning">Pending</span>';
                        }
                        if ($object->status == 'denied') {
                        $status = '<span class="label label-danger">Denied</span>';
                        }
                        else{
                        $status = '<span class="label label-warning">Not Available</span>';
                        }
                        echo '<tr>
                          <td>'.$object->pid.'</td>
                          <td>'.$object->fname.' '.$object->lname.'</td>
                          <td>'.$object->age.'</td>
                          <td>'.$gender.'</td>
                          <td>'.$status.'</td>
                          <td><button class="btn btn-primary report" id="view" value='.$object->pid.' data-toggle="modal" data-target="#modal-default">View</button></td>
                        </tr>';
                        }
                        }
                        else {
                        echo "Error : ".mysqli_error();
                        }
                        ?>
                        <div class="modal fade" id="modal-default">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">CKD Report</h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-lg-6 col-xs-12">
                                  <div class="form-group"><label>Blood Pressure:(mm/Hg)</label><p id="bp"></p></div>
                                  <div class="form-group"><label>Specific Gravity:</label><p id="sg"></p></div>
                                  <div class="form-group"><label>Albumin:</label><p id="al"></p></div>
                                  <div class="form-group"><label>Sugar:</label><p id="su"></p></div>
                                  <div class="form-group"><label>Red Blood Cell:</label><p id="rbc"></p></div>
                                  <div class="form-group"><label>Pus Cell:</label><p id="pc"></p></div>
                                  <div class="form-group"><label>Pus Cell Clumps:</label><p id="pcc"></p></div>
                                  <div class="form-group"><label>Bacteria:</label><p id="ba"></p></div>
                                  <div class="form-group"><label>Blood Glucose Random: (mgs/dl)</label><p id="bgr"></p></div>
                                  <div class="form-group"><label>Blood Urea: (mgs/dl)</label><p id="bu"></p></div>
                                  <div class="form-group"><label>Serum Creatinine: (mgs/dl)</label><p id="sc"></p></div>
                                  <div class="form-group"><label>Sodium: (mEq/L)</label><p id="sod"></p></div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                  <div class="form-group"><label>Potassium: (mEq/L)</label><p id="pot"></p></div>
                                  <div class="form-group"><label>Hemoglobin: (gms)</label><p id="hemo"></p></div>
                                  <div class="form-group"><label>Packed Cell Volume:</label><p id="pcv"></p></div>
                                  <div class="form-group"><label>White Cell Blood Count: (cells/cumm)</label><p id="wbcc"></p></div>
                                  <div class="form-group"><label>Red Cell Blood Count: (millions/cmm)</label><p id="rbcc"></p></div>
                                  <div class="form-group"><label>Hypertension:</label><p id="htn"></p></div>
                                  <div class="form-group"><label>Diabetes Mellitus:</label><p id="dm"></p></div>
                                  <div class="form-group"><label>Coronary Artery Disease:</label><p id="cad"></p></div>
                                  <div class="form-group"><label>Appetite:</label><p id="appet"></p></div>
                                  <div class="form-group"><label>Pedal Edema:</label><p id="pe"></p></div>
                                  <div class="form-group"><label>Anemia:</label><p id="ane"></p></div>
                                  <div class="form-group"><label>Result:</label><p id="ckd"></p></div>
                                </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <center><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button></center>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Report</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
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
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
    $(document).ready(function () {
    $('.sidebar-menu').tree()
    })
    $(function () {
    $('#example1').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
    })
    $('#example2').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : false
    })
    })
    </script>
  </body>
</html>