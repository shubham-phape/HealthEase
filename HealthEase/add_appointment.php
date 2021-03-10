<?php
include 'connect.php';
session_start();
  $pid = $_POST['jspid'];
  $date = $_POST['jsdate'];
  $time = $_POST['jstime'];
  $cat=$_POST['jscat'];
  $datetime = $date." ".$time;
  $currentsession_id=$_SESSION['id'];
  

  if($cat==0) {
    $result= $mysqli->query("INSERT INTO appointment(apid,pid,schedule_date,category) VALUES('',$pid,'$datetime','0');");
    $getidquery=mysqli_query($mysqli,"SELECT did FROM doctor_details WHERE id=$currentsession_id");
     $t=mysqli_fetch_array( $getidquery );
     $did=$t['did'];
     $hierarchy= mysqli_query($mysqli,"INSERT INTO hierarchy_doc_pat (hapid,did,pid) VALUES('','$did','$pid')");
  }
  else if($cat==1){
     $result= $mysqli->query("INSERT INTO appointment(apid,pid,schedule_date,category) VALUES('',$pid,'$datetime','1');");
     $getidquery=mysqli_query($mysqli,"SELECT aid FROM assistant_details WHERE id=$currentsession_id");
     $t=mysqli_fetch_array( $getidquery );
     $assisid=$t['aid'];
     $hierarchy= mysqli_query($mysqli,"INSERT INTO hierarchy_ass_pat (hapid,aid,pid) VALUES('','$assisid','$pid')");
   }
  if($result) {
    $json = array();
           
            $json["status"] = "success";
            $json["op"]="";
            $json["message"] = "Appointment successfully scheduled.";
            echo json_encode($json);
    
  }
  else{
     $json = array();
           
            $json["status"] = "failed";
            $json["message"] = $mysqli->error;
            echo json_encode($json);
    
  }

?>