<?php  
include 'inc/header.php';
include 'inc/db.php';

$select="SELECT * FROM banner WHERE del=0 ORDER BY id DESC LIMIT 3";
if (mysqli_query($conn,$select)) {
	$run=mysqli_query($conn,$select);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			$temp=array('id'=>$fetch['id'],'about'=>$fetch['about'],'file'=>$fetch['file']);
			array_push($banners, $temp);
		}
		
		$response=array('status'=>true,'banners'=>$banners);
	}
}
include 'inc/footer.php';
?>