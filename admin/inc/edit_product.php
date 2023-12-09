<?php 
session_start(); 
include 'domain.php';
if (isset($_POST)) {
	include 'file_upload.php';
	$name=$_POST['name'];
	$category=$_POST['category'];
	$dest='../../image';
	if($_FILES['files']['name'] == "") {
		$files=$_POST['image'];
	}else{
		$file_stat=file_upload($_FILES['files'],'image',$dest);
		if ($file_stat['status']==true) {
			$files=$domain.'/image/'.$file_stat['file'];
		}else{
			$_SESSION['msg']=$file_stat['msg'];
			goto b;
		}
	}
	
	$about=$_POST['about'];
	$selling_price=$_POST['selling_price'];
	$original_price=$_POST['original_price'];
	$currency=$_POST['currency'];
	include 'db.php';
	$sql="UPDATE products SET name='$name',category='$category',files='$files',about='$about',selling_price='$selling_price',original_price='$original_price',currency='$currency' WHERE id='$id'";
	if (mysqli_query($conn,$sql)) {
		$_SESSION['msg']='Product updated';
	}else{
		$_SESSION['msg']='Failed to update';
	}
}else{
	$_SESSION['msg']='illegal request';
}
b:
header('Location:'.$domain.'/admin/'.$_SESSION['basefile'].'.php');
?>