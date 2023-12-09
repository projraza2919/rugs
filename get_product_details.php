<?php 
$response='illegal_request'; 
if (isset($_POST)) {
	$id=$_POST['id'];
	$sql="SELECT about FROM products WHERE id='$id' AND del=0 LIMIT 1";
$response='failed';
if (mysqli_query($conn,$sql)) {
	$run=mysqli_query($conn,$sql);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			$response=$fetch['about'];
		}
	}
}

}
echo $response;
?>