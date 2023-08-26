<html>
    <head>
        <link rel="stylesheet" href="assets/css/cart.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

        <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

        <link rel="stylesheet" href="assets/css/owl-carousel.css">

        <link rel="stylesheet" href="assets/css/lightbox.css">
    </head>

<body>
<header>
  <?php 
        include './connect.php';
        include './header.php';
        if(isset($_COOKIE['userId'])){
          $userId = $_COOKIE['userId'];
          $sql = "SELECT * FROM orders AS o, product AS p WHERE o.order_status = 1 AND o.prod_id = p.prod_id AND o.user_id = '$userId'";
          // echo $sql; exit;
          $rs = $con ->query($sql);
          $total = 0 ;
        }
  ?>
</header>
<div style="margin-top: 100px;">
  
</div>  
<center>
<div class="container px-3 my-5 clearfix">

    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2>History Cart</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered m-0">
                <thead>
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Product Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 170px;">Total</th>
                    <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    while ($row = mysqli_fetch_assoc($rs)){
                      $total += $row['order_total'];
                  ?>
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <a href="./single-product.php ?id=<?php echo $row['prod_id'] ?>">
                          <img src="./assets/images/<?php echo $row['prod_image']?>" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                        </a>
                        <div class="media-body">
                          <a href="./single-product.php ?id=<?php echo $row['prod_id'] ?>" class="d-block text-dark"><?php echo $row['prod_name'] .' | ' ; echo $row['order_date'] ?></a>
                          <small>
                            <!-- <span class="text-muted">Color:</span>
                            <span class="ui-product-color ui-product-color-sm align-text-bottom" style="background:#e81e2c;"></span> &nbsp;
                            <span class="text-muted">Size: </span> EU 37 &nbsp;
                            <span class="text-muted">Ships from: </span> China -->
                          </small>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?php echo number_format($row['prod_price'], 0, ',', '.'). 'VND' ?></td>
                    <td class="align-middle p-4"><center><?php echo $row['order_numberOfItem']?></center></td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?php echo number_format($row['order_total'], 0, ',', '.').' VND' ?></td>
                    <td class="text-center align-middle px-0"><a href="./delete_item.php ?&id=<?php echo $row['order_id']?>" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                  </tr>
                  <?php } ?>    
                </tbody>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <!-- <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control"> -->
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <!-- <label class="text-muted font-weight-normal m-0">Discount</label>
                  <div class="text-large"><strong>$20</strong></div> -->
                </div>
                <div class="text-right mt-4">
                  <label class="text-muted font-weight-normal m-0">Total price</label>
                  <div class="text-large"><strong><?php echo number_format($total, 0, ',', '.').' VND'?></strong></div>
                </div>
              </div>
            </div>
        
            <div class="float-right">
              <button id="index" type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button>
              <!-- <button id="check_out" type="button" class="btn btn-lg btn-primary mt-2">Checkout</button> -->
            </div>
        
          </div>
      </div>
  </div>
</center>
</body>
<footer>
  <?php 
    include './footer.php';
  ?>
</footer>
<script>
    document.getElementById("index").addEventListener("click", function() {
      window.location.href = "./index.php"; // Điều hướng đến trang index.php khi nút được nhấn
  });
  
  document.getElementById("check_out").addEventListener("click", function() {
      window.location.href = "./check_out.php"; // Điều hướng đến trang index.php khi nút được nhấn
  });

  
</script>
</html>