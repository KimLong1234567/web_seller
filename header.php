<html>
    <head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    </head>
    <body>

    <?php 
        include "./connect.php";
        if(isset($_COOKIE['userId'])){
            $userId = $_COOKIE['userId'];
            $sql = "SELECT * FROM users WHERE user_id = '$userId'";
            // echo $sql; exit;
            $rse = mysqli_query($con, $sql);
            $rs = mysqli_fetch_assoc($rse);
          }
    ?>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="./index.php" class="active">Trang Chủ</a></li>
                            <li class="scroll-to-section"><a href="./thoi_trang.php">Thời Trang</a></li>
                            <li class="scroll-to-section"><a href="./dau_thom.php">Dầu Thơm</a></li>
                            <li class="scroll-to-section"><a href="./phu_kien.php">Phụ Kiện</a></li>
                            <li class="scroll-to-section"><a href="./trang_suc.php">Trang Sức</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="products.php">Products</a></li>
                                    <!-- <li><a href="single-product.html">Single Product</a></li> -->
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </li>
                            <!-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a rel="nofollow" href="https://templatemo.com/page/4" target="_blank">Template Page 4</a></li>
                                </ul>
                            </li> -->
                            <?php 
                                if(isset($userId)){
                                    echo '';
                                }
                                else{
                                    echo '<li class="scroll-to-section"><a href="login.php">Login</a></li>';
                                }
                            ?>
                            <?php 
                                if(isset($userId)){
                                    echo '<li class="scroll-to-section"><a>Hi, '.$rs['user_name'].'</a></li>
                                    <li class="scroll-to-section"><a href="logout.php">Log out</a></li>';
                                }
                                else{
                                    echo '<li class="scroll-to-section"><a href="sign_up.php">Sign Up</a></li>';
                                }
                            ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    
</html>