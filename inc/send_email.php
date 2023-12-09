<?php  
if (isset($_POST)) {
	$email=$_POST['email'];
	$to = "ahlrugs1@gmail.com";
$subject = "News letter";
$txt = "Email: ".$email;
$headers = "From: ".$email;

if (mail($to,$subject,$txt,$headers)) {
	header("Location:../?stat=sent");
}else{
	header("Location:../?stat=failed");

}
}else{
	header("Location:../?stat=illegal_request");

}

?>