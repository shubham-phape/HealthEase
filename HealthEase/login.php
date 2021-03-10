
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log In | HealthEase</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="text/javascript" src="jquery-3.2.0.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Health</b>Ease</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form class="form" method="post">
      <br>
      <div class="message" id="message" style="margin: auto;"></div>
      <div class="form-group has-feedback">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <!-- <div class="form-group has-feedback">
          <select class="form-control select2" name="category" style="width: 100%;">
            <option selected="selected" value="3">Patient</option>
            <option value="2">Assistant</option>
            <option value="1">Doctor</option>
          </select>
      </div> -->
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <!-- <label>
              <input type="checkbox">&nbsp Remember Me
            </label> -->
            <!-- <a href="#">I forgot my password</a><br> -->
            <a href="register.php" class="text-center">Register a new membership</a>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" id="submit"  class="btn btn-primary btn-block">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
 
 </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function(){
$("#submit").click(function(){
     var Password = $("#password").val();
      var Email = $("#email").val();
         var dataString ='&jsemail='+ Email +
                '&jspassword='+ Password;
                 if(Email==''||Password=='')
                {
                  alert("Please fill all fields");
                }
                else
                {
                  $.ajax({
                        type    : "POST",
                        url     : "login_process.php",
                        data    : dataString,
                        cache: false,
                        dataType: "json",
                        success : function(json)
                        {
                           
                           console.log(json);
                             
                              //window.location = 'Doctor_dashboard.html';
                          if (json.status =="success") 
                          {
                            $("form")[0].reset(); 
                            $("#message").html("You have successfully logged in.");
                             if(json.register != 0){
                               if (json.category == 1) {
                                 window.location = 'ReportForDoctor.php';
                                  }
                                if (json.category  == 2) {
                                 window.location = 'Assistant_dashboard.php';
                                   }
                                if (json.category == 3) {
                                 window.location = 'Patient_dashboard.php';
                                   }
                                }
                              else{
                                if (json.category  == 1) {
                                 window.location = 'Doctor_details.php';
                                   }
                                if (json.category  == 2) {
                                   window.location = 'Assistant_details.php';
                                  }
                                if (json.category  == 3) {
                                   window.location = 'Patient_details.php';
                               }
                              }
                            //alert("You have successfully Logged in.");
                          }
                          else
                          {
                            //incorrect email or password
                             $("form")[0].reset(); 
                            $("#message").html(json.message);
                          }
                        },
                         afterSend: function(){
                            $("#message").html("after send");
                        },
                        beforeSend:function(){
                            $("#message").html("Loading...")
                        }, 
                        complete: function(){
                            //$("#message").html("complete");
                       },
                       error: function(jqXHR, textStatus, errorThrown){
                        console.log('error');
                        console.log(textStatus);
                       }
                    });

                }
                return false;
  });
});
   
 </script>
</body>
</html>
