<?php 
session_start(); 
if (isset($_POST)) {
	include 'domain.php';
	$name=$_POST['name'];
	$keywords=$_POST['keywords'];
	include 'db.php';
	$check="SELECT * FROM category WHERE name='$name' AND del=0 LIMIT 1";
	if (mysqli_query($conn,$check)) {
		$run=mysqli_query($conn,$check);
		if (mysqli_num_rows($run)>0) {
			while ($fetch=mysqli_fetch_assoc($run)) {
				$_SESSION['msg']='category already exists and status is'.$fetch['status'];
			}
		}else{
			$sql="INSERT INTO category(name,keywords,status) VALUES('$name','$keywords','active')";
	if (mysqli_query($conn,$sql)) {
		$_SESSION['msg']='category uploaded';
	}else{
		$_SESSION['msg']='Failed to upload';
	}
		}
	}
	
	
}else{
	$_SESSION['msg']='illegal request';
}

header('Location:'.$domain.'/admin/'.$_SESSION['basefile'].'.php');
?>