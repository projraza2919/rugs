<?php  
include 'inc/header.php';
include 'inc/string_validate.php';
include 'inc/db.php';
$offset=string_validate($data['offset']);
$products=array();
$select="SELECT * FROM products WHERE del=0 ORDER BY id DESC LIMIT ".$offset." 10";
if (mysqli_query($conn,$select)) {
	$run=mysqli_query($conn,$select);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			$temp=array('id'=>$fetch['id'],'name'=>$fetch['name'],'category'=>$fetch['category'],'about'=>$fetch['about'],'files'=>unserialize($fetch['files']));
			array_push($products, $temp);
		}
		$offset=$offset+10;
		$response=array('status'=>true,'products'=>$products,'offset'=>$offset);
	}
}
include 'inc/footer.php';
?>