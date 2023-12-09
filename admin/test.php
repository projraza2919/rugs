<?php  
/*
include 'inc/db.php';
$id='id';
$sql="UPDATE users SET status='admin' WHERE username='akira'";
if (mysqli_query($conn,$sql)) {
	echo "done";
}

*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>test file upload</title>
</head>
<body>
<form action="inc/test.php" method="post" enctype="multipart/form-data">
	<input type="file" name="files">
	<input type="submit" name="submit">
</form>
</body>
</html>