<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Responsive Checkout Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/check_out.css">
</head>
<?php 
    include './connect.php';
    if(isset($_COOKIE['userId'])){
        $userId = $_COOKIE['userId'];
        $sql = "SELECT * FROM orders AS o, users AS u, product AS p WHERE o.user_id = '$userId' AND u.user_id = '$userId' AND o.prod_id = p.prod_id";
        // echo $sql; exit;
        $rs = $con ->query($sql);
        $r = mysqli_fetch_assoc($rs);
        $user_name = $r['user_name'];
        $item = 0;
        $total = 0;
        foreach($rs as $row){
            $item += 1;
        }
    }
?>
<body>
    <h2>Checkout Form</h2>
    <div class="row">
        <div class="col-75">
            <div class="container">
            <form action="./finishpaid.php" enctype="multipart/form-data" method="POST"> 
                <div class="row">
                    <div class="col-50">
                        <h3>Billing Address</h3>
                        <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" value="<?php echo $user_name ?>">
                        <label for="email"><i class="fa fa-solid fa-phone"></i> Phone</label>
                            <input type="text" id="email" name="phone" placeholder="0915623112">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="số 5, đường Nguyễn Văn Cừ, Quận Bình Thuỷ">
                        <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Tp.Cần Thơ">

                        <div class="row">
                        <div class="col-50">
                            <!-- <label for="state">State</label>
                            <input type="text" id="state" name="con" placeholder="MH"> -->
                        </div>
                        <div class="col-50">
                            <!-- <label for="zip">Zip</label>
                            <input type="text" id="zip" name="zip" placeholder="400001"> -->
                        </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Payment</h3>
                        <!-- <label for="fname">Accepted Cards</label> -->
                        <div class="icon-container">
                            <!-- <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i> -->
                        </div>
                        <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="enter name card">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <!-- <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="December"> -->
                        <div class="row">
                            <div class="col-50">
                                <!-- <label for="expyear">Exp Year</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2027"> -->
                            </div>
                            <div class="col-50">
                                <!-- <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="123"> -->
                            </div>
                        </div>
                    </div>

                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                </label>
                <input type="submit" name="submit" value="Continue to checkout" class="btn">
            </form>
        </div>
    </div>
                    
    <!-- not use -->
    <!-- <div class="col-25">
        <div class="container">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo $item ?></b></span></h4>
            <?php 
                while($row = mysqli_fetch_assoc($rs)){
                    $total += $row['prod_price']
            ?>
            <p><a href="./single-product.php ?&id=<?php echo $row['prod_id']?>"><?php echo $row['prod_name'] ?></a> <span class="price"><?php echo $row['prod_price'] ?></span></p>
            <p><a href="#">Item 2</a> <span class="price">$95</span></p>
            <p><a href="#">Item 3</a> <span class="price">$100</span></p>
            <p><a href="#">Item 4</a> <span class="price">$50</span></p>
            <hr>
                <?php }?>
            <p>Total <span class="price" style="color:black"><b><?php echo number_format($total, 0, ',', '.').' VND'?></b></span></p>
            
        </div>
    </div> -->

    </div>
</body>
</html>