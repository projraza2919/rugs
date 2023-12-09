<?php  
include 'db.php';

$sql="SELECT * FROM products WHERE del=0 AND status='active' LIMIT ".$offset.", 9";
//$response='No data';
$res='';
if (mysqli_query($conn,$sql)) {
	$run=mysqli_query($conn,$sql);
	if (mysqli_num_rows($run)>0) {
		while ($fetch=mysqli_fetch_assoc($run)) {
			$res='<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  '.$fetch['category'].'
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>'.$fetch['name'].'</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> '.$fetch['about'].' </p>
                      
                    </div>
                    <div class="col-5 text-center">
                      <img src="'.$fetch['files'].'" alt="'.$fetch['name'].'" class="img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="inc/product_delete.php?id='.$fetch['id'].'" class="btn btn-sm btn-danger">
                      <i class="fas fa-times"></i> Delete
                    </a>
                    <a href="inc/product_inactive.php?id='.$fetch['id'].'" class="btn btn-sm btn-warning">
                      <i class="fas fa-exclamation"></i> Inactive
                    </a>
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
//get pae numbers

$sql="SELECT * FROM products WHERE del=0 AND status='active'";
if (mysqli_query($conn,$sql)) {
	$run=mysqli_query($conn,$sql);
	$val=mysqli_num_rows($run);
	if ($val>0) {
    $n = $val/9;
    $whole = floor($n);      // 1
    $fraction = $n - $whole;
    if ($fraction>0) {
     $n=$n+1; 
    }
    for ($i=0; $i < $n; $i++) { 
      if ($i==($offset/9)) {
        echo '<li class="page-item active"><a class="page-link" href="products.php?offset='.($i*9).'">'.($i+1).'</a></li>';
      }else{
        echo '<li class="page-item active"><a class="page-link" href="products.php?offset='.($i*9).'">'.($i+1).'</a></li>';
      }
      
    }
		
	}
}


?>