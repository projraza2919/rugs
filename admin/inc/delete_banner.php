<?php  
session_start();
include 'domain.php';
include 'db.php';
if (isset($_POST)) {
	$id=$_POST['id'];
	$sql="UPDATE banner SET del=1 WHERE id='$id'";
	if (mysqli_query($conn,$sql)) {
		$_SESSION['msg']='Banner deleted';
	}
}else{
	$_SESSION['msg']='illegal request';
}
header('Location:'.$domain.'/admin/'.$_SESSION['basefile'].'.php');

?>