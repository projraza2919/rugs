<?php  
$servername="Localhost";
$database="ahlrugs";
//$dussername="ahlrugs";
//$dpassword="#Ansari1@web";
$dussername="root";
$dpassword="";

$conn= mysqli_connect($servername,$dussername,$dpassword,$database);
if (!$conn) {
	die("connection_error");
}
?>