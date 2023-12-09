<?php 
session_start();
$_SESSION['basefile']=basename(__FILE__, '.php'); 
include 'inc/db.php';
include 'inc/auth.php';
$offset=0;
if (isset($_GET['offset'])) {
	if (!empty($_GET['offset'])) {
		if ($_GET['offset']>0) {
			$offset=$_GET['offset'];
		}
	}
}
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

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            <?php  
            $sql="SELECT * FROM products WHERE del=0 LIMIT ".$offset.", 9";
//$response='No data';
$res='';
if (mysqli_query($conn,$sql)) {
  $run=mysqli_query($conn,$sql);
  if (mysqli_num_rows($run)>0) {
    while ($fetch=mysqli_fetch_assoc($run)) {
      if ($fetch['status']=='active') {
        $status='<a href="product_inactive.php?id='.$fetch['id'].'" class="btn btn-sm btn-warning">
                      <i class="fas fa-exclamation"></i> Inactive
                    </a>';
      }else{
        $status='<a href="product_active.php?id='.$fetch['id'].'" class="btn btn-sm btn-success">
                      <i class="fas fa-check"></i> Activate
                    </a>';
      }
      $res='<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Category: '.$fetch['category'].'
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>Name: '.$fetch['name'].'</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> '.$fetch['about'].' </p>
                      
                    </div>
                    <div class="col-5 text-center">
                      <img src="'.$fetch['files'].'" alt="'.$fetch['name'].'" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="product_delete.php?id='.$fetch['id'].'" class="btn btn-sm btn-danger">
                      <i class="fas fa-times"></i> Delete
                    </a>
                    '.$status.'
                    <a href="edit_product.php?id='.$fetch['id'].'" class="btn btn-sm btn-info">
                      <i class="fas fa-cog"></i> Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>'.$res;
    }
  }else{
    $res='No products to show';
  }
}

echo $res;
            ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <?php 
              $sql="SELECT * FROM products WHERE del=0 AND status='active'";
if (mysqli_query($conn,$sql)) {
  $run=mysqli_query($conn,$sql);
  $val=mysqli_num_rows($run);
  if ($val>0) {
    $n = $val/9;
    $whole = floor($n);      // 1
    $fraction = $n - $whole;
    if ($whole>0) {
      if ($fraction>0) {
        $n=$n+1; 
      }
    }
    for ($i=0; $i < $n; $i++) { 
      if ($i==($offset/9)) {
        echo '<li class="page-item active"><a class="page-link" href="products.php?offset='.($i*9).'">'.($i+1).'</a></li>';
      }else{
        echo '<li class="page-item "><a class="page-link" href="products.php?offset='.($i*9).'">'.($i+1).'</a></li>';
      }
      
    }
    
  }
}
              ?>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require('inc/footer.php'); ?>
</body>
</html>
