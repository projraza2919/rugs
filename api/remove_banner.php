<?php  

include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';

$id=string_validate($data['id']);
$select="SELECT * FROM banner WHERE id='$id' AND del=0 LIMIT 1";
if (mysqli_query($conn,$select)) {
	$run=mysqli_query($conn,$select);
	if (mysqli_num_rows($run)>0) {
		$query="UPDATE banner SET del=1 WHERE id='$id'";
		if (mysqli_query($conn,$query)) {
			$response=array('status'=>true);
		}
	}
}

include 'inc/footer.php';
?>