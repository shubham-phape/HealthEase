<?php
$details = $_GET['details'];
$page = $_GET['page'];
echo "details is ".$details. " and page is ".$page."</br>";
if ($details == "true") {
	echo "Details Filled";
	if($page == 1){
		header("refresh:2; url=ReportForDoctor.php");
	}
	if($page == 2){
		header("refresh:2; url=Assistant_dashboard.php");
	}
	if($page == 3){
		header("refresh:2; url=Patient_dashboard.php");
	}
	else{
		header("Location: logout.php");
	}
}
else{
	header("Location: logout.php");
}
?>