<!DOCTYPE html>
<?php
include 'connect.php'; ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Make Appointment | HealthEase</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <?php include 'assistant_header.php';?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?php include 'assistant_sidebar.php'; ?>

  <!-- =============================================== -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Make Appointment</li>
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
                <form role="form" method="post" action="Make_Appoinment.php">
                  <div class="box-body">
                    <div class="form-group">
                    <label>Select Patient</label>
                      <select class="form-control" name="details" id="details">
                        <option value="" selected="selected">Select Name</option>
                        <?php
                          $result = $mysqli->query('select * from patient_details');
                          if ($result) {
                             while ($object = $result->fetch_object()){
                              echo '<option   value="'.$object->pid.'">'.$object->fname.' '.$object->lname.'</option>';
                             }
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                    <label>Date:</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="date" id="date" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                      </div>
                    <!-- /.input group -->
                    </div>
                <div class="form-group">
                  <label>Time:</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" name="time" id="time" class="form-control" data-inputmask="'alias': 'hh:mm'" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
                <div class="message" id="message" style="margin: auto;"></div>
                  <div class="box-footer">
                    <center><button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button></center>
                  </div>
                </form>
              </div>
              <!-- /.box -->
            </div>
          </div>
          
        </section>
        <script type="text/javascript">
        $(document).ready(function(){
        $("#submit").click(function(){
          var Pid=document.getElementById("details").selectedIndex;
          var Ddate=$("#date").val();
          var Ttime=$("#time").val();
          
          var cat=1;
          var dataString ='&jspid='+ Pid +
                '&jsdate='+ Ddate+'&jstime='+ Ttime +"&jscat="+ cat;
                //alert(dataString);

                 if(Pid==''||Ddate=='' || Ttime=='')
                {
                  $("#message").html("* Please fill all details".fontcolor('red'));
                }
                else
                {
                  $.ajax({
                        type    : "POST",
                        url     : "add_appointment.php",
                        data    : dataString,
                        cache: false,
                        dataType: "json",
                        success : function(json)
                        {
                           
                            if (json.status =="success") 
                          {
                            //console.log(json);
                           $("#message").html(json.message.fontcolor('blue'));
                           $("form")[0].reset();
                          }
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                        console.log('error');
                        console.log(textStatus);
                       }
                      });

                }

          });
        });
        </script>
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
    //Timemask hh:mm
    $('#timemask').inputmask('hh:mm', { 'placeholder': 'hh:mm' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
   

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    
    //Colorpicker
   
  })
    </script>
  </body>
</html>