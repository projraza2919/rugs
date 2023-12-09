<?php  
session_start();
if (isset($_POST)) {

	include 'db.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT id,password,status,del FROM users WHERE username='$username' LIMIT 1";
	$run=mysqli_query($conn,$sql);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			$pass=$fetch['password'];
			$status=$fetch['status'];
			$del=$fetch['del'];
			$id=$fetch['id'];
		}
		if ($del==1) {
			$_SESSION['msg']='Your account has been deleted, please contact admin';
		goto b;
		}
		if ($status!='admin') {
			$_SESSION['msg']='You are not an admin';
		goto b;
		}
		if (password_verify($password, $pass)) {
			$new="SELECT id FROM accounts WHERE uid='$id' ORDER BY id ASC LIMIT 1";
			if (mysqli_query($conn,$new)) {
				$r=mysqli_query($conn,$new);
				if (mysqli_num_rows($r)>0) {
					while ($fetch=mysqli_fetch_assoc($r)) {
						$acc=$fetch['id'];
					}
					$_SESSION['account']=$acc;
					$_SESSION['username']=$username;
					$_SESSION['id']=$id;
					header("Location:../");
					exit(); 
				}else{
					$_SESSION['msg']='No accounts';
					goto b;
				}
			}else{
				$_SESSION['msg']='unexpected error';
				goto b;
			}
			                  
		}
	}else{
		//username does not exist
		$_SESSION['msg']='Username does not exist';
		goto b;
	}
}else{
	//ilegal request
	header("Location:../login.php?stat=illegal_request");
	exit();
}

b:
header("Location:/mlm/workspace2/admin/".$_SESSION['basefile'].".php?stat=".$_SESSION['msg']);
?>