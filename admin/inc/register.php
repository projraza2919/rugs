<?php  
session_start();
if (isset($_POST)) {
	require 'db.php';
	$username=$_POST['username'];
	$name=$_POST['name'];
	$key='';
	if (isset($_POST['key_']) && !empty($_POST['key_'])) {
		$key=$_POST['key_'];
		$stmt = $conn->prepare("SELECT key_ FROM temp_users WHERE email=? LIMIT 1");
	//$username=$_POST['username'];
    $stmt->bind_param("s", $username);
    $stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {

		$stmt->bind_result($key_it);
		//echo $username.'<br>'.$key_it;exit();
		if ($stmt->fetch() && password_verify($key, $key_it)) {
			
				$_SESSION['msg']='Key verified';
				header("Location:/lms/create_password.php?username=".$username."&key=".$key."&name=".$name);
				exit();
			}else{
				$_SESSION['msg']='invalid_key';
			}
	 	
	 }else{
	 	$_SESSION['msg']='invalid_email';
	 }
	}else{
		//no key
		//username not there
	 	$key_=bin2hex(random_bytes(8));
	 	$stmt = $conn->prepare("INSERT INTO temp_users(name,email,key_) VALUES(?,?,?)");
		//$username=$_POST['username'];
		$hp=password_hash($key_, PASSWORD_DEFAULT);
    	$stmt->bind_param("sss",$name,$username,$hp);
    	
    	if ($stmt->execute()) {
    		$_SESSION['msg']='You have requested a registration request, please wait untill you get a confirmation';
    		//$_SESSION['temp_key']=$key_;
    		$val[]=array('email'=>$username,'key'=>$key_);
    		$fp = fopen('key/'.date('U').'.json', 'w');
			fwrite($fp, json_encode($val));
			fclose($fp);
    	}else{
    		$_SESSION['msg']='Fatal error';
    	}
	}
	
	

}else{
	//illegal request
	$_SESSION['msg']='illegal request';
}
header("Location:/lms/".$_SESSION['basefile'].".php?stat=".$_SESSION['msg']);
?>