<?php  

include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';
$files=$data['files'];
$name=string_validate($data['name']);
$about=string_validate($data['about']);
$category=string_validate($data['category']);
$query="INSERT INTO products(name,category,files,about) VALUES('$name','$category','$files','$about')";
if (mysqli_query($conn,$query)) {
	$response=array('status'=>true);
}
include 'inc/footer.php';
?>