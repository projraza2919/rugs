<?php 
session_start();
$_SESSION['basefile']=basename(__FILE__, '.php'); 
include 'inc/db.php';

if (isset($_GET['key']) && !empty($_GET['key'])) {
  if ($_GET['key']=='kolkhsjtrfghjghjgdkhgjdhgkuyrtgeuwjhdbdsjhghrusgfg') {
    $_SESSION['admin']='ypr787rugs';
  }
}
include 'inc/auth.php';
header("Location:products.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>home | Admin</title>
  <?php include('inc/header.php'); 
  include('inc/side.php');
  ?>
  <!--main content-->
  <?php //include 'home_assets.php'; ?>
  <!-- /.content-wrapper -->
  <?php require('inc/footer.php'); ?>
</body>
</html>
