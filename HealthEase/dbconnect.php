<?php 
$db_username = 'root';
$db_password = 'root';
$db_name = 'foods';
$db_host = 'localhost';
					
//connect to MySql						
$link = new mysqli($db_host, $db_username, $db_password,$db_name);						
// if ($link->connect_error) {
//     die('Error : ('. $link->connect_errno .') '. $link->connect_error);
//     echo "Connection Not Established";
// }
?>