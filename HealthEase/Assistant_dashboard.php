<?php
include 'connect.php';
//session_start();
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
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
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
          <h1>
          Dashboard
          <!-- <small>it all starts here</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <?php
                  $result = $mysqli->query('select count(*) as total from login_details where register = 0 and category = 3');
                  if ($result) {
                  $data=mysqli_fetch_assoc($result);
                  echo "<h3>".$data['total']."</h3>";
                  }
                  ?>
                  <p>New Patients</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>96.67<sup style="font-size: 20px">%</sup></h3>
                  <p>Accuracy</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <?php
                  $result = $mysqli->query('select count(*) as total from login_details where category = 3');
                  if ($result) {
                  $data=mysqli_fetch_assoc($result);
                  echo "<h3>".$data['total']."</h3>";
                  }
                  ?>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <?php
                  $result = $mysqli->query('select count(*) as total from patient_details');
                  if ($result) {
                  $data=mysqli_fetch_assoc($result);
                  echo "<h3>".$data['total']."</h3>";
                  }
                  ?>
                  <p>Website Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div><br>
          <!-- Default box -->
          <div class="row">
            <div class="col-md-5 col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">New Patients</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered">
                    <thead>
                      <tr>
                      <th>ID</th>
                      <th>USER</th>
                    </tr>
                    </thead>
                    <?php
                    $result  = $mysqli->query('select * from login_details where register = 0 and category = 3');
                    if ($result) {
                    while ($object = $result->fetch_object()) {
                    echo "<tr>
                      <td>".$object->id."</td>
                      <td>".$object->email_id."</td>
                    </tr>";
                    }
                    }
                    else {
                    echo "Error : ".mysqli_error();
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Patients</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Race</th>
                        <!-- <th>Address</th> -->
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result  = $mysqli->query('select * from patient_details');
                      if ($result) {
                      while ($object = $result->fetch_object()) {
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
                      echo "<tr>
                        <td>".$object->id."</td>
                        <td>".$object->fname." ".$object->lname."</td>
                        <td>".$object->dob."</td>
                        <td>".$object->height."</td>
                        <td>".$object->weight."</td>
                        <td>".$object->race."</td>
                        <!--<td>".$object->address."</td>-->
                        <td>".$status."</span></td>
                      </tr>";
                      }
                      }
                      else {
                      echo "Error : ".mysqli_error();
                      }
                      ?>
                      
                      <!-- <tr>
                        <td>219</td>
                        <td>Alexander Pierce</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <td>657</td>
                        <td>Bob Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-primary">Approved</span></td>
                      </tr>
                      <tr>
                        <td>175</td>
                        <td>Mike Doe</td>
                        <td>11-7-2014</td>
                        <td><span class="label label-danger">Denied</span></td>
                      </tr> -->
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                  </table>
                </div>
                <!-- /.box-body -->
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