<?php  
include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';
$name=string_validate($data['name']);
$contact=string_validate($data['contact']);
$email=string_validate($data['email']);
$message=string_validate($data['message']);
$query="INSERT INTO contacts(name,contact,email,message) VALUES('$name','$contact','$email','$message')";
if (mysqli_query($conn,$query)) {
	$response=array('status'=>true);
}
include 'inc/footer.php';
?>