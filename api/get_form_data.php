<?php  
include 'inc/header.php';
include 'inc/db.php';
$contacts=array();
$select="SELECT * FROM contacts WHERE del=0 AND status='inserted'";
if (mysqli_query($conn,$select)) {
	$run=mysqli_query($conn,$select);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			$temp=array('id'=>$fetch['id'],'name'=>$fetch['name'],'contact'=>$fetch['contact'],'email'=>$fetch['email'],'message'=>$fetch['message']);
			array_push($contacts, $temp);
		}
		
		$response=array('status'=>true,'contacts'=>$contacts);
	}
}
include 'inc/footer.php';
?>