<?php  
include 'domain.php';
$main=0;
if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
	if ($_SESSION['admin']=='ypr787rugs') {
		$main=1;
	}
}

if ($main==0) {
	header("Location:".$domain);
}

?>