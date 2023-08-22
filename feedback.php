<?php
    include './connect.php';
    $id = $_GET['id'];
    // echo 'da vao'; exit;
    // echo $_FILES['feed_back_image']['name'];exit;
    if(isset($_POST['submit']) && isset($_COOKIE['userId'])){
        $user_id = $_COOKIE['userId'];
        $user_name = $_POST['name'];
        $user_phone = $_POST['phone'];
        $user_mess = $_POST['message'];
        $feed_back_image = $_FILES["feed_back_image"]['name'];
        
        $duoi = explode('.', $feed_back_image);
        $duoi = $duoi[(count($duoi) - 1)];
        $path_image = $feed_back_image;
        $feed_back_image_tmp = $_FILES["feed_back_image"]['tmp_name'];
        // echo 'da vpo'; exit;
        if(!empty($feed_back_image)){
            // echo 'da va'; exit;
          

            $sql = "INSERT INTO feed_back (feed_back_name, feed_back_phone, feed_back_mess, feed_back_date, feed_back_image, user_id, prod_id) 
            VALUES ('$user_name', '$user_phone', '$user_mess', CURRENT_TIMESTAMP(),'$feed_back_image','$user_id','$id')";
            mysqli_query($con, $sql);
            move_uploaded_file($feed_back_image_tmp, './assets/images/' . $path_image);
            // echo $sql; exit;
            header('location:index.php');
        }
        else{
            echo 'da vo'; exit;
            $user_id = $_COOKIE['userId'];
            $user_name = $_POST['name'];
            $user_phone = $_POST['phone'];
            $user_mess = $_POST['message'];

            $sql = "INSERT INTO feed_back (feed_back_name, feed_back_phone, feed_back_mess, feed_back_date, user_id, prod_id) 
            VALUES ('$user_name', '$user_phone', '$user_mess', CURRENT_TIMESTAMP(),'$user_id','$id')";
            mysqli_query($con, $sql);
            header('location:single-product.php');
        }
    }
    else{
        echo "<script>alert('You not login yet');location.href='./login.php'</script>";
    }
?>