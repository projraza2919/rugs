<?php 
session_start(); 
if (isset($_POST)) {
	include 'domain.php';
	include 'file_upload.php';
	$about=$_POST['about'];
	$loc='../../banner';
	$test=file_upload($_FILES['files'],'image',$loc);
	if ($test['status']==true) {
		$file=$domain.'/banner/'.$test['file'];
	}else{
		$_SESSION['msg']=$test['msg'];
		goto b;
	}
	include 'db.php';
	$sql="INSERT INTO banner(about,file) VALUES('$about','$file')";
	if (mysqli_query($conn,$sql)) {
		$_SESSION['msg']='Banner uploaded';
	}else{
		$_SESSION['msg']='Failed to upload Banner';
	}
	
	
}else{
	$_SESSION['msg']='illegal request';
}
b:
header('Location:'.$domain.'/admin/'.$_SESSION['basefile'].'.php');
?>