<?php  

include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';
$file=$data['file'];
$about=string_validate($data['about']);
$query="INSERT INTO banner(file,about) VALUES('$file','$about')";
if (mysqli_query($conn,$query)) {
	$response=array('status'=>true);
}
include 'inc/footer.php';
?>