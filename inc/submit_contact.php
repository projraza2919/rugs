<?php  
if (isset($_POST)) {
	$email=$_POST['email'];
	$name=$_POST['name'];
	$contact=$_POST['contact'];
	$message=$_POST['message'];
	$to = "ahlrugs1@gmail.com";
$subject = "Contact submission";
$txt = "Email: ".$email."\n Name: ".$name. "\n Contact:".$contact."\n Message:".$message;
$headers = "From: ".$email;

if (mail($to,$subject,$txt,$headers)) {
	header("Location:../contact.php?stat=contact_sent");
}else{
	header("Location:../contact.php?stat=contact_failed");

}
}else{
	header("Location:../?stat=illegal_request");

}

?>