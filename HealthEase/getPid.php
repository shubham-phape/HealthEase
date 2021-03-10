<?php
include 'connect.php';
//echo "PID".$_REQUEST['pid'];
if($_REQUEST['pid']) 
{
	$sql = "SELECT TIMESTAMPDIFF(YEAR, dob, CURDATE()) AS age FROM patient_details WHERE pid='".$_REQUEST['pid']."'";
	$result = $mysqli->query($sql);
	$data = array();
	if ($result) 
	{
		while ($row = $result->fetch_assoc()) 
		{
			$data['age'] = $row['age'];
		}
	}
	echo json_encode($data);
}
else 
{
	echo 0;	
}
?>