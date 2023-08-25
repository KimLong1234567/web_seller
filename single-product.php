<?php 
    include './connect.php';
    $id = $_GET['id'];
    if(isset($_GET['id'])){
        
        $sql = "SELECT * FROM product AS p, product_category AS pc WHERE p.prod_id = '$id' AND p.prod_cate_id = pc.prod_cate_id";
        // echo $sqla; exit;
        $rs = $con->query($sql);
        $r = mysqli_fetch_assoc($rs);
        $prod_id = $r['prod_id'];
    }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Detail Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    <?php 
        include './header.php';
    ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Single Product Page</h2>
                        <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="left-images">
                    <img src="assets/images/<?php echo $r['prod_image'] ?>" alt="">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <form action="./add_cart.php?&id=<?php echo $id?>" method="POST">
                        <h4><?php echo $r['prod_name']; ?></h4>
                        <span class="price"><?php echo number_format($r['prod_price'], 0, ',', '.').' VND' ?></span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span><?php echo $r['prod_detail'] ?></span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Số sản phẩm</h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="<?php echo $r['prod_quantity'] ?>" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="" readonly="true"><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <!-- <h4>Total: </h4> -->
                            <div class="main-border-button"><button type="submit" name="add"><a>Add To Cart</a></button></div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->

    
    <!-- phan binh luan -->
    <?php
        $sqla = "(SELECT * FROM feed_back WHERE prod_id = '$id') ORDER BY feed_back_date DESC";
        $rsa = $con->query($sqla);
        // echo $sqla; exit;
        while ($row = mysqli_fetch_assoc($rsa)){
            
    ?>
    <div class="container">
        <table>
            <thead>
                <th scope="col">Bình Luận</th>
            </thead>
            <thead>
                <th scope="row"><?php echo $row['feed_back_name'] ?></th>
                <td><?php echo $row['feed_back_date'] ?></td>
            </thead>
            <thead>
                <td><?php echo $row['feed_back_mess'] ?></td>
                <td><img src="./assets/images/<?php echo $row['feed_back_image'] ?>" alt="bugs" style="height: 160px; width: 160px;"></td>
            </thead>
        </table>
    </div>
    <?php }?>

    <?php
        if(isset($_COOKIE['userId'])){
            $userId = $_COOKIE['userId'];
            $sqlo = "SELECT * FROM users WHERE user_id = '$userId'";
            // echo $sqlo; 
            $rss = mysqli_query($con,$sqlo);
            $ra = mysqli_fetch_assoc($rss);
            $user_name = $ra['user_name'];
        }
    ?>
    <div class="contact-us">
        <div class="container">
                <form id="contact" action="./feedback.php ?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset>
                                <input name="name" type="text" id="name" value="<?php if(isset($user_name)){echo $user_name;} else{echo '';} ?>" placeholder="tên bạn" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset>
                                <input name="phone" type="number" id="số điện thoại" placeholder="số điện thoại" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Your message" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            
                                <input id="image" type="file" name="feed_back_image" class="form-control" accept="image/*">
                        
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button type="submit" name="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- ***** Footer Start ***** -->
    <footer>
        <?php 
            include './footer.php';
        ?>       
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    <script src="assets/js/quantity.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });
    </script>

  </body>

</html>
