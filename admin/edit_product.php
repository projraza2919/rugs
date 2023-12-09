<?php 
session_start();
$_SESSION['basefile']=basename(__FILE__, '.php'); 
include 'inc/db.php';
//include 'inc/auth.php';
//get all product ifo
if (isset($_GET['id'])) {
  if (empty($_GET['id'])) {
    goto b;
  }else{
    $id=$_GET['id'];
    $sql="SELECT * FROM products WHERE id='$id' AND del=0 LIMIT 1";
	if (mysqli_query($conn,$sql)) {
		$run=mysqli_query($conn,$sql);
		if (mysqli_num_rows($run)>0) {
			while ($fetch=mysqli_fetch_assoc($run)) {
				$name=$fetch['name'];
				$category=$fetch['category'];
				$files=$fetch['files'];
				$about=$fetch['about'];
				$selling_price=$fetch['selling_price'];
				$original_price=$fetch['original_price'];
				$currency=$fetch['currency'];
				$id=$fetch['id'];
			}
		}else{
			goto b;
		}
	}else{
		goto b;
	}
  }
}else{
  b:
  header("Location:products.php?stat=fatal_error");
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
  
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit product id: <?php echo $id; ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $_SESSION['basefile']=='index' ? "" : $_SESSION['basefile']; ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section> 
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit product details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="inc/edit_product.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Product name</label>
                    <input name="name" value="<?php echo($name); ?>" type="text" class="form-control" id="name" placeholder="Enter Product">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                      <?php  
                      $sql="SELECT * FROM category WHERE del=0 AND status='active'";
                      if (mysqli_query($conn,$sql)) {
                        $run=mysqli_query($conn,$sql);
                        if (mysqli_num_rows($run)>0) {
                          while ($fetch=mysqli_fetch_assoc($run)) {
                            $t=$fetch['name'];
                            echo '<option value="'.$t.'">'.$t.'</option>';
                          }
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="currency">Currency</label>
                        <input name="currency" value="<?php echo($currency); ?>"  type="text" class="form-control" id="currency" placeholder="Enter curency symbol" value="₹">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="original_price">original price</label>
                        <input value="<?php echo($original_price); ?>"  name="original_price" type="number" class="form-control" id="original_price" placeholder="Enter Original price">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="selling_price">Selling price</label>
                        <input value="<?php echo($selling_price); ?>"  name="selling_price" type="number" class="form-control" id="selling_price" placeholder="Enter Selling price">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>About the product</label>
                    <textarea value="<?php echo($about); ?>"  name="about" class="form-control" rows="4" placeholder="Product description"></textarea>
                  </div>
                  <input type="text" name="image" value="<?php echo($files); ?>" hidden="">
                  <div class="form-group">
                    <label for="image_upload">Upload image</label>
                    <img src="<?php echo($files); ?>" style="height: 20vh; width:auto;" class="img-fluid" >
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="files" id="image_upload">
                        <label class="custom-file-label" for="image_upload">Choose Image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update product</button>
                </div>
              </form>
            </div>
            
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>   
  </div>

  <?php require('inc/footer.php'); ?>
</body>
</html>
