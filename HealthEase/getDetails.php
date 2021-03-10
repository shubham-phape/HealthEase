<?php
include 'connect.php';
//echo "PID".$_REQUEST['pid'];
if($_REQUEST['pid']) {
	$sql = "SELECT pid,id,gender,TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age, race FROM patient_details WHERE pid='".$_REQUEST['pid']."'";
	$result = $mysqli->query($sql);
	$data = array();
	if ($result) {
		while ($row = $result->fetch_assoc()) {
			$data = $row;
		}
		//$object = $result->fetch_object();
		$pid = $data["pid"];
		//echo $pid;
		$result1 = $mysqli->query("SELECT sc FROM  reports WHERE pid='".$pid."'");
		if ($result1) {
			while ($row1 = $result1->fetch_assoc()) {
				//array_push($data,$row1);
				$data['sc']=$row1['sc'];
			}
		}
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>