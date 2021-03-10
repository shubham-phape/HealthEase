<?php
include 'connect.php';
session_start();
/*$post = $_POST(['submit']);
echo $post;*/
/*$email = $_POST['email'];
echo $email;
*/



  $email = $_POST['jsemail'];
  $password = $_POST['jspassword']; 
  $email = mysqli_real_escape_string($mysqli,$email);
  $password = mysqli_real_escape_string($mysqli,md5($password));

  //echo $email;
  //$login = $mysqli->query('select * from loginDetails where email =\''.$email.'\' and password = \''.$password.'\'');
  if ($result  = $mysqli->query('select * from login_details where email_id =\''.$email.'\' and password = \''.$password.'\''))
  {
      //printf("Select returned %d rows.\n", $result->num_rows);
      if ($result->num_rows == 1) {
        if($result){
        //echo "Login Sucessfull...";
        $object = $result->fetch_object();
        $_SESSION['id'] = $object->id;
        $_SESSION['currentuser'] = $email;
        $_SESSION['login'] = 1;
        $_SESSION['category'] = $object->category;
        $register = $object->register;
       // echo "Your email id is ".$email.",id is ".$_SESSION['id'].", category is ".$_SESSION['category']."and register = ".$register;
       /* if($register != 0){
          if ($object->category == 1) {
            header("refresh:2; url=Doctor_dashboard.html");
          }
          if ($object->category == 2) {
            header("refresh:2; url=Assistant_dashboard.html");
          }
          if ($object->category == 3) {
            header("refresh:2; url=Patient_dashboard.html");
          }
        }
        else{
          if ($object->category == 1) {
            header('Location : Doctor_details.php');
          }
          if ($object->category == 2) {
            header('Location : Assistant_details.php');
          }
          if ($object->category == 3) {
            header('Location : Patient_details.php');
          }
        }*/
        $json = array();
           
            $json["status"] = "success";
             $json["message"] = "Sucessfull Login";
              $json["register"] = $register;
            $json["category"] = $object->category;
            echo json_encode($json);
        }
        
       
        //header("refresh:2; url=index.php");
      }
      else {
            $json = array();
            $json["status"] = "failed";
            $json["message"] = "*Incorrect Email or Password";
            $json["register"] = "";
            $json["category"] = "";
            echo json_encode($json);
      }
    /* free result set */
  }else{

    echo "Error : ".mysql_error();
  }
  $result->close();

?>