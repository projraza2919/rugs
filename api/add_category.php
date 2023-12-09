<?php  

include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';

$name=string_validate($data['name']);
$keywords=string_validate($data['keywords']);

$select="SELECT name FROM category WHERE name='$name' AND del=0 LIMIT 1";
if (mysqli_query($conn,$select)) {
	$run=mysqli_query($conn,$select);
	if (mysqli_num_rows($run)<0) {
		$response=array('status'=>false,'msg'=>'category already exists');
	}else{
		$query="INSERT INTO category(name,keywords) VALUES('$name','$keywords')";
		if (mysqli_query($conn,$query)) {
			$response=array('status'=>true);
		}
	}
}

include 'inc/footer.php';
?>