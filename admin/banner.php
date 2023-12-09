<?php 
session_start();
$_SESSION['basefile']=basename(__FILE__, '.php'); 
include 'inc/db.php';
//include 'inc/auth.php';
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $_SESSION['basefile']=='index' ? "" : $_SESSION['basefile']; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          
          <?php  
          include 'inc/db.php';
          $q="SELECT * FROM banner WHERE del=0 ORDER BY id DESC ";
          if (mysqli_query($conn,$q)) {
            $run=mysqli_query($conn,$q);
            if (mysqli_num_rows($run)>0) {
              while ($fetch=mysqli_fetch_assoc($run)) {
                echo '<div class="col-md-4">

            <div class="card card-widget widget-user">
              
              <div class="widget-user-header text-white"
                   style="background: url("'.$fetch['file'].'") center center;">
                <h5 class="widget-user-desc text-left">Web Designer</h5>
                <h3 class="widget-user-username text-left">'.$fetch['about'].'</h3>
                
              </div>
              <a href="delete_banner.php?id='.$fetch['id'].'" class="btn btn-danger">remove</a>
            </div>
          </div>';
              }
            }else{
              echo "No banners uploaded";
            }
          }else{
            echo "execution failed";
          }

          ?>
         
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require('inc/footer.php'); ?>
</body>
</html>
