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
  
  <div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>General Form</h1>
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
                <h3 class="card-title">Fill product details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="inc/add_product.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Product name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter Product">
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
                        <input name="currency" type="text" class="form-control" id="currency" placeholder="Enter curency symbol" value="₹">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="original_price">original price</label>
                        <input name="original_price" type="number" class="form-control" id="original_price" placeholder="Enter Original price">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="selling_price">Selling price</label>
                        <input name="selling_price" type="number" class="form-control" id="selling_price" placeholder="Enter Selling price">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>About the product</label>
                    <textarea name="about" class="form-control" rows="4" placeholder="Product description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image_upload">Upload image</label>
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
                  <button type="submit" class="btn btn-primary">Upload product</button>
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
