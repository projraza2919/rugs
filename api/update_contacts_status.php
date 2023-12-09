<?php  
include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';
$id=string_validate($data['id']);
$status=string_validate($data['status']);
$select="SELECT status FROM contacts WHERE id='$id' AND del=0 LIMIT 1";
if (mysqli_query($conn,$select)) {
	$run=mysqli_query($conn,$select);
	if (mysqli_num_rows($run)>0) {
		$query="UPDATE category SET status='$status' WHERE id='$id'";
		if (mysqli_query($conn,$query)) {
			$response=array('status'=>true);
		}
	}
}

include 'inc/footer.php';
?>