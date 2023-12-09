<?php  
include 'inc/db.php';
$sql="SELECT * FROM category WHERE del=0 AND status='active' ORDER BY id DESC ";
$response='No products to show';
if (mysqli_query($conn,$sql)) {
	$run=mysqli_query($conn,$sql);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			echo '<div class="col-md-3 col-sm-6" style="margin-top:10px;">
              <div class="white-box">
                <div class="wishlist-icon">
                  <p style="color:black;">'.$fetch['products'].'</p>
                </div>
                <div class="product-bottom">
                  <div class="product-name" id="category_'.$fetch['id'].'_name">'.ucfirst($fetch['name']).'</div>
                  
                  <a href="products_by_category.php?category='.$fetch['name'].'" class="btn btn-primary"  id="category_'.$fetch['id'].'">Explore</a>
                </div>
              </div>
            </div>';
		}
	}
}

?>