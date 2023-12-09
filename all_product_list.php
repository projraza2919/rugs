<?php  
include 'inc/db.php';
$sql="SELECT id,name,category,files,about FROM products WHERE del=0 AND status='active' ORDER BY id DESC";
$response='No products to show';
if (mysqli_query($conn,$sql)) {
	$run=mysqli_query($conn,$sql);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			echo '<div class="col-md-3 col-sm-6 " style="margin-top:10px;">
              <div class="white-box">
                <div class="wishlist-icon">
                  
                </div>
                <div class="product-img">
                  <img id="product_'.$fetch['id'].'_img" src="'.$fetch['files'].'">
                </div>
                <div class="product-bottom">
                  <div class="product-name" id="product_'.$fetch['id'].'_name">'.$fetch['name'].'</div>
                  <div class="price" id="product_'.$fetch['id'].'_category">
                    '.$fetch['category'].' 
                  </div>
                  <button type="button" class="btn btn-primary" onclick="product_info(this.id)" id="product_'.$fetch['id'].'"> Quick View</button>
                </div>
              </div>
            </div>
            <div style="display:none;" id="product_'.$fetch['id'].'_content">'.$fetch['about'].'</div>';
		}
	}
}

?>