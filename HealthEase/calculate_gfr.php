<?php
include 'connect.php';
//session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GFR Calculation | HealthEase</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="getDetails.js"></script>
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
          GFR Calculation
          <!-- <small>it all starts here</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">GFR Calculation</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6 col-xs-12 col-md-offset-3">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Calculated GFR</h3>
                </div>
                <?php
                include 'connect.php';
                // session_start();
                if (isset($_POST['submit'])){
                    $id = $_POST['details'];
                    $gender = $_POST['gender'];
                    if ($gender == 'Male') {
                    $gender = 1;
                    }
                    else{
                    $gender = 0;
                    }
                    $age = $_POST['age'];
                    $race = $_POST['race'];
                    if ($race == 'black') {
                    $race = 1;
                    }
                    else{
                    $race = 0;
                    }
                    $scr = $_POST['sc'];
                    $gfr =0.0;
                    $k = 0.0;
                    $a = 0.0;
                    if ($gender == 0) {
                    $k = 0.7;
                    $a = -0.329;
                    }
                    else {
                    $k = 0.9;
                    $a = -0.411;
                    }
                    //echo "ID is ".$id." Gender is ".$gender." Age is ".$age." Race is ".$race." SC is ".$scr."</br>";
                    if ($gender == 0) {
                    # gender is female
                    // echo "gender is female</br>";
                    if ($race == 1) {
                    # race is black
                    // echo "race is black</br>";
                    $gfr=141*(pow(min(($scr/$k),1),$a))*(pow(max(($scr/$k),1),-1.209))*pow(0.993,$age)*1.018*1.159;
                    }
                    else {
                    $gfr=141*(pow(min(($scr/$k),1),$a))*(pow(max(($scr/$k),1),-1.209))*pow(0.993,$age)*1.018;
                    }
                    }
                    else{
                    # gender is male
                    // echo "gender is male</br>";
                    if ($race == 1) {
                    # race is black
                    // echo "race is black</br>";
                    $gfr=141*(pow(min(($scr/$k),1),$a))*(pow(max(($scr/$k),1),-1.209))*pow(0.993,$age)*1.159;
                    }
                    else {
                    $gfr=141*(pow(min(($scr/$k),1),$a))*(pow(max(($scr/$k),1),-1.209))*pow(0.993,$age);
                    }
                    }
                    //echo "</br>GFR value is ".$gfr."</br>";
                    $stage = 0;
                    $stagenumber=0;
                    if ($gfr>=90) {
                    $stage = 'CKD Stage 1';
                    $stagenumber = 1;
                    }
                    elseif($gfr>=60 && $gfr<90){
                    $stage = 'CKD Stage 2';
                    $stagenumber = 2;
                    }
                    elseif ($gfr>=30 && $gfr<60) {
                    $stage = 'CKD Stage 3';
                    $stagenumber = 3;
                    }
                    elseif ($gfr>=15 && $gfr<30) {
                    $stage = 'CKD Stage 4';
                    $stagenumber = 4;
                    }
                    elseif ($gfr<15) {
                    $stage = 'CKD Stage 5';
                    $stagenumber = 5;
                    }
                    //echo "Stage is ".$stage;
                    if ($result = $mysqli->query('UPDATE stage SET stage = '.$stagenumber.', gfr = "'.$gfr.'" WHERE pid = \''.$id.'\'')) {
                        //echo "</br>Successfull";
                    }
                    else{
                        echo "Error".$mysqli->error;
                    }
                }
                ?>
                <!-- <input type="hidden" id="preval" value="" />
                <input type="text" id="newval" value="" />
                <input type="button" id="change" value="Change" /> -->
                <!-- <div class="box col-md-offset-3"> -->
                  <div class="box-body">
                    <!-- <div style="clear:both"></div> -->
                    <!-- <label>Calculated GFR</label> -->
                    <div class="demo">
                      <center><input class="knob" data-min="0" data-displayPrevious=true data-max="1000" value="" data-fgColor="#f56954"><br>
                      <label><h3>Patient is detected with <?php echo $stage; ?></h3></label></center>
                    </div>
                  </div>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </section>
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