<?php  
$servername="Localhost";
$database="webmuza_ahl";
$dussername="root";
$dpassword="";

$conn= mysqli_connect($servername,$dussername,$dpassword,$database);
if (!$conn) {
	die("connection_error");
}
?>