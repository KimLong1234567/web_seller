<?php
include("../connect.php");

$sqlSelect = "SELECT * FROM product_category";
$rs = $con->query($sqlSelect);

if (isset($_POST["submit"])) {
    $prod_id = $_POST["prod_id"];
    $prod_name = $_POST["prod_name"];
    $prod_detail = $_POST["prod_detail"];
    $prod_price = $_POST["prod_price"];
    $prod_origin = $_POST["prod_origin"];
    $prod_cate_id = $_POST["prod_cate_id"];
    $prod_image = $_FILES["prod_image"]['name'];
    $duoi = explode('.', $prod_image); // tách chuỗi khi gặp dấu .
    $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
    $path_image = $prod_image;
    $prod_image_tmp = $_FILES["prod_image"]['tmp_name'];
    $prod_quatity = $_POST["prod_quatity"];

    if (isset($_POST['prod_id']) && isset($_POST['prod_name']) && isset($_POST['prod_detail']) && isset($_POST['prod_quatity']) && isset($_POST['prod_origin']) && isset($_POST['prod_price']) && isset($_FILES['prod_image'])) {
        $query = "SELECT prod_id FROM product WHERE prod_id = '$prod_id'";
        $result = mysqli_query($con, $query); //sử dụng hàm mysqli_query() để thực thi truy vấn SQL trên kết nối cơ sở dữ liệu $con. Kết quả trả về từ truy vấn này được gán cho biến $result.

        $numb = mysqli_num_rows($result); // sử dụng hàm mysqli_num_rows() để đếm số hàng trả về từ kết quả truy vấn $result. Số hàng này là số sản phẩm đã thêm

        // num = 1 tìm thấy một sản phẩm hoặc một id đã tồn tại trong cơ sở dữ liệu
        if ($numb == 1) {
            $message = "This product already exist, Please check it again!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $sql = "INSERT INTO product (prod_id, prod_name, prod_detail, prod_price, prod_origin, prod_image, prod_quantity, prod_cate_id, prod_date_add)  
            VALUES ('$prod_id', '$prod_name', '$prod_detail', '$prod_price', '$prod_origin', '$prod_image', '$prod_quatity','$prod_cate_id',CURRENT_TIMESTAMP())";
            mysqli_query($con, $sql);
            move_uploaded_file($prod_image_tmp, '../assets/images/' . $path_image);
            header('location:adminProductMange.php');
        }
    } else {
        $mq = "Vui lòng nhập đầy đủ thông tin";
        echo "<script type='text/javascript'>alert('$mq');</script>";
    }
}
?>
<html>
    <head>
        <link rel="stylesheet " href="../assets/css/user_login.css">
    </head>
<body>
    

<div class="main">
    <form method="POST" action="addProducts.php" enctype="multipart/form-data" class="form" id="form-1" style="margin: 30px auto 30px auto;">
        <h3 class="heading">Thêm sản phẩm</h3>
        <div class="spacer"></div>
    

        <div class="form-group">
            <label for="product_id" class="form-label">Mã sản phẩm</label>
            <input id="prodcut_id" type="text" placeholder="Nhập mã sản phẩm" name="prod_id" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="product_name" class="form-label">Tên sản phẩm</label>
            <input id="product_name" type="text" placeholder="Nhập tên sản phẩm" name="prod_name" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="product_detail" class="form-label">Chi tiết sản phẩm</label>
            <textarea id="product_detail" type="text" placeholder="Nhập chi tiết sản phẩm" name="prod_detail" style="height: 50px" class="form-control"></textarea>
            <span class="form-message"></span>
        </div> 
          
        <div class="form-group">
            <label for="number_item" class="form-label">Số lượng sản phẩm nhập kho</label>
            <input id="number_item" type="number" placeholder="Nhập số lượng" name="prod_quatity" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="origin" class="form-label">Xuất xứ</label>
            <input id="origin" type="text" placeholder="Nhập xuất xứ" name="prod_origin" class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="origin" class="form-label" >Loại sản phẩm</label>
            <select name="prod_cate_id" id="type" class="form-control">
                <?php
                    while ($row = mysqli_fetch_assoc($rs)) {
                ?>
                <option value="<?php echo $row['prod_cate_id']; ?>">
                                <?php echo $row['prod_cate_name']; ?>
                </option>
                <?php 
                    }
                ?>
            </select>
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Hình ảnh sản phẩm</label>
            <input id="image" type="file" name="prod_image" class="form-control" accept="image/*">
            <span class="form-message"></span>
        </div>

        
        <div class="form-group">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input id="price" type="number" placeholder="Nhập giá sản phẩm" name="prod_price" class="form-control">
            <span class="form-message"></span>
        </div>
        <button class="form-submit" name="submit">Thêm sản phẩm</button>

        
    </form>
</div>
    <script src="..assets/js/validator.js"></script>
    <script>
        Validator({
            form: '#form-1',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#prodcut_id', 'Vui lòng nhập mã sản phẩm'),
                Validator.isRequired('#product_name', 'Vui lòng nhập tên sản phẩm'),
                Validator.isRequired('#product_detail', 'Vui lòng nhập chi tiết sản phẩm'),
                Validator.isRequired('#origin', 'Vui lòng nhập xuất xứ'),
                Validator.isRequired('#number_item', 'Vui lòng nhập số lượng'),
                // Validator.isRequired('#image', 'Vui lòng nhập hình ảnh'),
                Validator.isRequired('#price', 'Vui lòng nhập giá tiền'),
            ]
        });
    </script>
</body>
</html>