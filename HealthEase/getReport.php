<?php
include 'connect.php';
if($_REQUEST['pid']){
	$result = $mysqli->query("SELECT pid,bp,sg,al,su,rbc,pc,pcc,ba,bgr,bu,sc,sod,pot,hemo,pcv,wbcc,rbcc,htn,dm,cad,appet,pe,ane FROM reports WHERE pid='".$_REQUEST['pid']."'");
	$data = array();
	if ($result) 
	{
		while ($row = $result->fetch_assoc()) 
		{
			$data = $row;
		}
		$result1 = $mysqli->query("SELECT ckd FROM  stage WHERE pid='".$_REQUEST['pid']."'");
		if ($result1) {
			while ($row1 = $result1->fetch_assoc()) {
				//array_push($data,$row1);
				$data['ckd']=$row1['ckd'];
			}
		}
	}
	echo json_encode($data);
}
else {
	echo 0;	
}
?>