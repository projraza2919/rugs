<?php  

include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';

$name=string_validate($data['name']);
$select="SELECT id FROM category WHERE name='$name' AND del=0 LIMIT 1";
if (mysqli_query($conn,$select)) {
	$run=mysqli_query($conn,$select);
	if (mysqli_num_rows($run)>0) {
		$query="UPDATE category SET del=1 WHERE name='$name'";
		if (mysqli_query($conn,$query)) {
			$response=array('status'=>true);
		}
	}
}

include 'inc/footer.php';
?>