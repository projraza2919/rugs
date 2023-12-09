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
            $sql="SELECT * FROM products WHERE del=0 AND status='active' LIMIT ".$offset.", 6";
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
            ?>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>