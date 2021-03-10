<?php
session_start();

if ($_SESSION['login'] ==1) {
	session_destroy(); 
	echo "Sucessfull Logout...";
}
header("refresh:2; url=login.php");


?>