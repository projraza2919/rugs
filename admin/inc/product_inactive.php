<?php  
session_start();
include 'domain.php';
include 'db.php';
if (isset($_POST)) {
	$id=$_POST['id'];
	$sql="UPDATE products SET status='inactive' WHERE id='$id'";
	if (mysqli_query($conn,$sql)) {
		$_SESSION['msg']='Status changed to inactive';
	}
}else{
	$_SESSION['msg']='illegal request';
}
header('Location:'.$domain.'/admin/'.$_SESSION['basefile'].'.php');

?>