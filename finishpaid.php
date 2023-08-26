<?php 
    include './connect.php';
    $userId = $_COOKIE['userId'];
    // echo 'da vao'; exit;
    // var_dump($_POST['submit']); exit;

    if(isset($_POST['submit'])){
        // echo 'da vao'; exit;
        if(isset($_POST["firstname"]) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['city'])
            && isset($_POST['cardname']) && isset($_POST['cardnumber']) ){
                // echo 'da vao'; exit;
            $name = $_POST['firstname'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $cardname = $_POST['cardname'];
            $cardnumber = $_POST['cardnumber'];
            $sql_upUser = "UPDATE users SET user_name = '$name' WHERE user_id = '$userId'";
            // echo $sql_upUser;
            $sql_update = "UPDATE orders SET order_status = '1', order_address = '$address', order_phone = '$phone', order_city = '$city', 
            order_name_card_customer = '$cardname', order_number_credit_card = '$cardnumber'
            WHERE user_id = '$userId'";
            // echo $sql_update; exit;
            $up = $con->query($sql_upUser);
            $que = $con->query($sql_update);
            // SELECT * FROM orders AS o, users AS u WHERE o.user_id = '3' AND u.user_id = '3' AND o.pet_prod_id = '123';
            echo "<script>location.href='./printBill.php'</script>";
        }
        else{
            echo "<script>alert('Vui lòng điền đủ thông tin') location.href='./check_out.php'</script>";
        }
    }
    else {
        echo "<script>alert('some thing wrong');location.href='./check_out.php'</script>";
    }
?>

