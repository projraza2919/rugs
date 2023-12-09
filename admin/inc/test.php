<?php  
if (isset($_POST)) {
	include 'file_upload.php';
	echo file_upload($_FILES['files'],'image','../../test');
}else{
	echo "illegal request";
}
?>