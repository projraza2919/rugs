<?php  
$servername="Localhost";
$database="ahlrugs";
//$dussername="ahlrugs";
//$dpassword="#Ansari1@web";
$dussername="root";
$dpassword="";

$conn= mysqli_connect($servername,$dussername,$dpassword,$database);
if (!$conn) {
	die("connection_error");
}

function update_category(){
	$main=0;
	$sql="SELECT * FROM category WHERE del=0 AND status='active' ORDER BY id DESC";
	if (mysqli_query($conn,$sql)) {
	$run=mysqli_query($conn,$sql);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			$categ=$fetch['category'];
			$id=$fetch['id'];
			$q="SELECT id FROM products WHERE category='$categ'";
			if (mysqli_query($conn,$q)) {
				$bun=mysqli_query($conn,$q);
				if (mysqli_num_rows($bun)>0) {
					$count=mysqli_num_rows($bun);
					$s="UPDATE category SET products='$count' WHERE id='$id'";
					if (mysqli_query($conn,$s)) {
							$main=$main+1;
						}	
				}
			}
		}
	}
}

return $main;

}
?>