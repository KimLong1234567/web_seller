<?php
    include './connect.php';
    // echo 'da vao'; exit;
    // echo $_POST['message']; exit;

        // echo 'da vao'; exit;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO contact (contact_mess, contact_name, contact_email, contact_date_add) 
        VALUES ('$message', '$name', '$email', CURRENT_TIMESTAMP())";
        mysqli_query($con,$sql);
        echo "<script>alert('Cảm ơn bạn đã liên hệ, chúng tôi sẽ liên lạc với bạn sớm nhất có thể') location.href='./contact.php'</script>";
?>