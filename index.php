<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Welcom to HUY Store</title>


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
    
    <!-- ***** Preloader Start ***** -->
    <?php 
        include './header.php';
    ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Welcom to Huy Store</h4>
                                <span>The most fashionable come from our store</span>
                                <!-- <div class="main-border-button">
                                    <a href="#">Purchase Now!</a>
                                </div> -->
                            </div>
                            <img src="assets/images/left-banner-image.jpg" alt="" style="height: 630px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Dầu Thơm</h4>
                                            <span>Best Clothes For Women</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Dầu Thơm</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="./dau_thom.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/dior-sauvage-eau-de-parfum-100ml_e1c611f46daa451f8a159c1652c8d6c1_grande.webp" style="height: 300px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Thời Trang</h4>
                                            <span>Best Clothes For Men</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>THời Trang</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="./thoi_trang.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-02.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4 style="color: black;">Phụ Kiện</h4>
                                            <span style="color: black;">Best Clothes For Kids</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Phụ Kiện</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="./phu_kien.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/dajd064_f1886a74dce946f3bddba29ec0a284f6_1024x1024.webp" style="height: 300px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Trang Sức</h4>
                                            <span>Best Trend Accessories</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Trang Sức</h4>
                                                <p>Lorem ipsum dolor sit amet, conservisii ctetur adipiscing elit incid.</p>
                                                <div class="main-border-button">
                                                    <a href="./trang_suc.php">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/images/trang-suc-cho-nam-gioi-1.png" style="height: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Men's Latest</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                        <?php 
                            include './connect.php';
                            $sql = "(SELECT * FROM product WHERE prod_cate_id = '1') ORDER BY prod_date_add DESC";
                            $rs = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_assoc($rs)) {
                                $r = $row['prod_id'];
                        ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.php ?id=<?php echo $r?>"><i class="fa fa-eye"></i></a></li>
                                            <!-- <li><a href="single-product.html"><i class="fa fa-star"></i></a></li> -->
                                            <li><a href="single-product.php ?id=<?php echo $r?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <a href="single-product.php ?id=<?php echo $r?>" style="text-decoration: none;">
                                        <img src="./assets/images/<?php echo $row['prod_image'] ?>" alt="bug">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>
                                        <a href="single-product.php ?id=<?php echo $r?>" style="text-decoration: none;">
                                            <?php echo $row['prod_name'] ?>
                                        </a>
                                    </h4>
                                    <span><?php echo number_format($row['prod_price'], 0, ',', '.').' VND' ?></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Dầu thơm Lastest</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                        <?php
                            $sqli = "(SELECT * FROM product WHERE prod_cate_id = '2') ORDER BY prod_date_add DESC";
                            $rss = mysqli_query($con, $sqli);

                            while ($row = mysqli_fetch_assoc($rss)) {
                                $r = $row['prod_id'];
                        ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.php ?id=<?php echo $r?>"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.php ?id=<?php echo $r?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <a href="single-product.php ?id=<?php echo $r?>">
                                        <img src="assets/images/<?php echo $row['prod_image'] ?>" alt="bug">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>
                                        <a href="single-product.php ?id=<?php echo $r?>">
                                            <?php echo $row['prod_name'] ?>
                                        </a>
                                    </h4>
                                    <span><?php echo number_format($row['prod_price'], 0, ',', '.').' VND' ?></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Phụ Kiện Lastest</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                        <?php
                            $sqlia = "(SELECT * FROM product WHERE prod_cate_id = '4') ORDER BY prod_date_add DESC";
                            $rsss= mysqli_query($con, $sqlia);

                            while ($row = mysqli_fetch_assoc($rsss)) {
                                $r = $row['prod_id'];
                        ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.php ?id=<?php echo $r?>"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.php ?id=<?php echo $r?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <a href="single-product.php ?id=<?php echo $r?>">
                                        <img src="assets/images/<?php echo $row['prod_image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>
                                        <a href="single-product.php ?id=<?php echo $r?>">
                                            <?php echo $row['prod_name'] ?>
                                        </a>
                                    </h4>
                                    <span><?php echo number_format($row['prod_price'], 0, ',', '.').' VND' ?></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Trang suc area start *****  -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Trang Sức Lastest</h2>
                        <span>Details to details is what makes Hexashop different from the other themes.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                        <?php
                            $sqli = "(SELECT * FROM product WHERE prod_cate_id = '3') ORDER BY prod_date_add DESC";
                            $rss = mysqli_query($con, $sqli);

                            while ($row = mysqli_fetch_assoc($rss)) {
                                $r = $row['prod_id'];
                        ?>
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="single-product.php ?&id=<?php echo $r?>"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.php ?&id=<?php echo $r?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <a href="single-product.php ?id=<?php echo $r?>">
                                        <img src="assets/images/<?php echo $row['prod_image'] ?>" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <h4>
                                        <a href="single-product.php ?id=<?php echo $r?>">
                                            <?php echo $row['prod_name'] ?>
                                        </a>
                                    </h4>
                                    <span><?php echo number_format($row['prod_price'], 0, ',', '.').' VND' ?></span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Trang suc area end *****  -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul>
                        <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                        <li>Phone:<br><span>010-020-0340</span></li>
                        <li>Office Location:<br><span>North Miami Beach</span></li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul>
                        <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                        <li>Email:<br><span>info@company.com</span></li>
                        <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                    </ul>     
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->
    
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
