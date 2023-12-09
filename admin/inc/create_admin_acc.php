<?php  
include 'db.php';
$username="ahl_admin";
$password="#1ahl_admin";
$email='test@test.com';
$status='admin';
$hpas=password_hash($password, PASSWORD_DEFAULT);
$check="SELECT * FROM accounts WHERE username='$username' LIMIT 1";
if (mysqli_query($conn,$check)) {
	$run=mysqli_query($conn,$check);
	if (mysqli_num_rows($run)>0) {
		echo "account exists";
	}else{
		$sql="INSERT INTO accounts(username,password,email,status) VALUES('$username','$hpas','$email','$status')";
		if (mysqli_query($conn,$sql)) {
			echo "created";
		}
	}
}
 
?>