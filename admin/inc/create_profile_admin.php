<?php  
session_start();
if (isset($_POST['create_profile'])) {
/*
print_r($_FILES['upload']);
echo "<br><br>";
print_r($_FILES['upload']);
exit();

*/
	if (!empty($_POST['name']) && !empty($_POST['contact'])&& !empty($_POST['email'])&& !empty($_POST['asset_name'])) {
		include 'db.php';
	
		
		//image upload start
		$dest='asset_image';
$target_dir = $dest;
$tname=date("U");
$imageFileType = strtolower(pathinfo($dest.'/'.$_FILES['upload']["name"][0],PATHINFO_EXTENSION));
$target_file = $target_dir.'/'.$tname.'.'.$imageFileType;
$uploadOk = 1;
$msg='no';
		$check = getimagesize($_FILES['upload']["tmp_name"][0]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $msg='invalid_image';
    $uploadOk = 0;
  }

// Check if file already exists
if (file_exists($target_file)) {
	$msg='exist';
  //echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES['upload']["size"][0] > 500000) {
  $msg='big_file';
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
	$msg='invalid_format';
  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	$_SESSION['msg']=$msg.'- upload_failed';
	goto a;
  
} else {
  if (move_uploaded_file($_FILES['upload']["tmp_name"][0], $target_file)) {
    $asset_image=$tname.'.'.$imageFileType;
  } else {
  	$_SESSION['msg']=$msg.'- upload_failed_';
  	goto a;
    //echo "Sorry, there was an error uploading your file.";
  }
}

		//image upload stp

		

		//docs upload
		$dest='documents';
$target_dir = $dest;
$tname=date("U");
$imageFileType = strtolower(pathinfo($dest.'/'.$_FILES['upload']["name"][1],PATHINFO_EXTENSION));
$target_file = $target_dir.'/'.$tname.'.'.$imageFileType;
$uploadOk = 1;
$msg='no_docs';
		if ($_FILES['upload']["size"][1] > 500000) {
  $msg='big_file_documents';
  $uploadOk = 0;
}
if ($uploadOk == 0) {
	$_SESSION['msg']=$msg.'- upload_failed';
	goto a;
  
} else {
  if (move_uploaded_file($_FILES['upload']["tmp_name"][1], $target_file)) {
    $documents=$tname.'.'.$imageFileType;
  } else {
  	$_SESSION['msg']=$msg.'- upload_failed_';
  	goto a;
    //echo "Sorry, there was an error uploading your file.";
  }
}
		//docs upload_end
		$uid=$_POST['uid'];
		$name=$_POST['name'];
		$contact=$_POST['contact'];
		$asset_type=$_POST['asset_type'];
		$asset_name=$_POST['asset_name'];
		$user_quantity=$_POST['user_quantity'];
		$email=$_POST['email'];
		$query="SELECT id FROM admins WHERE email='$email' LIMIT 1";
		$run=mysqli_query($conn,$query);
		if (mysqli_num_rows($run)>0) {
			$sql="UPDATE admins SET name='$name',contact='$contact',asset_type='$asset_type',asset_name='$asset_name',user_quantity='$user_quantity',asset_image='$asset_image',documents='$documents',asset_code='$uid' WHERE email='$email'";
		}else{
			$sql="INSERT INTO admins(name,contact,email,asset_image,asset_name,asset_type,asset_code,documents,user_quantity) VALUES('$name','$contact','$email','$asset_image','$asset_name','$asset_type','$uid','$documents','$user_quantity')";
		}
		if (mysqli_query($conn,$sql)) {
			$_SESSION['msg']='profile_done';
			header("Location:/lms/");
			exit();
		}else{
			$_SESSION['msg']='profile_infomplete';
		}

	}else{
		$_SESSION['msg']='fill up correctly';
	}
}else{
	//illegal request
	$_SESSION['msg']='illegal request';
}
a:
header("Location:/lms/".$_SESSION['basefile'].".php");

?>





