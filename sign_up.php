<?php
    include './connect.php';
    if(isset($_POST["submit"])){
        $username = $_POST["name"];
        $password = hash("sha256" ,$_POST["password_confirmation"]);
        $email = $_POST["email"];


        if( $username != '' && $password != '' && $email != ''){
            $que = "select user_email from users where user_name = '$username'";
            $result = mysqli_query($con, $que);//sử dụng hàm mysqli_query() để thực thi truy vấn SQL trên kết nối cơ sở dữ liệu $con. Kết quả trả về từ truy vấn này được gán cho biến $result.
            $num = mysqli_num_rows($result);// sử dụng hàm mysqli_num_rows() để đếm số hàng trả về từ kết quả truy vấn $result. Số hàng này là số lượng người dùng có số điện thoại tương ứng với $phone.
        // num = 1 tìm thấy một tài khoản hoặc số điện thoại đã tồn tại trong cơ sở dữ liệu
            if ($num == 1){
                $message = "This account already exist, Please check it again!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else{
                $sql = "INSERT INTO users (user_name, user_password, user_email, user_date_add)  
                VALUES ('$username', '$password', '$email', CURRENT_TIMESTAMP())";
                mysqli_query($con, $sql);
                $ms = "Registration Successful";
                echo "<script>alert('$ms');location.href='./index.php'</script>";
            }
        }
        else{
            $mq = "Vui lòng nhập đầy đủ thông tin";
            echo "<script type='text/javascript'>alert('$mq');</script>";
        }
    }

?>

<html>
    <head>
        <link rel="stylesheet " href="./assets/css/user_login.css">
    </head>
    <body>
    <div class="main">
        <form action="sign_up.php" method="POST" class="form" id="form-1">
            <h3 class="heading">User Sign Up</h3>
            <div class="spacer"></div>

            <div class="form-group">
                <label for="fullname" class="form-label">User Name</label>
                <input id="fullname" type="text" name="name" placeholder="VD: Gia Huy" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" placeholder="Nhập mật khẩu" name="password"  class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
                <span class="form-message"></span>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input id = "email" type="text" placeholder="Nhập email" name="email" class="form-control">
                <span class="form-message"></span>
            </div>
                <button class="form-submit" name="submit">Đăng ký</button>
        </form>

    </div>    
    
    <script src="./assets/js/validator.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập username'),
                Validator.isEmail('#email', 'Vui lòng nhập email'),
                Validator.minLength('#password',6),
                Validator.isConfirmed('#password_confirmation', function(){
                    return document.querySelector('#form-1 #password').value;
                }, 'Mật khẩu nhập lại không chính xác'),
                Validator.isRequired('#phone', 'Vui lòng nhập số điện thoại'),
                Validator.isRequired('#address', 'Vui lòng nhập địa chỉ'),
            ]
        });
    </script>

    </body>
</html>