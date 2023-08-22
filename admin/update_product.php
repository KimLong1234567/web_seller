<?php
    //ket noi csdl
    include '../connect.php';

    //lay ma san pham 
    $code = $_GET['id'];
    //lay thong tin lien quan den san pham
    $sql_show_prd = "SELECT * FROM product  WHERE prod_id = '$code'";
    $sql_select = "SELECT * FROM product_category";
    // echo $sql_show_prd; exit;
    // thuc thi cau lenh sql
    $rs = mysqli_query($con,$sql_select);
    $result = mysqli_query($con,$sql_show_prd);
    //in ra form
    $r = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])){
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
        $prod_quantity = $_POST["prod_quantity"];
        
        if(!empty($prod_image)){
            // echo 'đã vào' .$pet_prod_img; exit;
            //viet cau lenh edit
            $sql_edit = "UPDATE product SET 
            prod_name = '$prod_name', 
            prod_detail = '$prod_detail', 
            prod_quantity = '$prod_quantity', 
            prod_origin = '$prod_origin', 
            prod_image = '$prod_image', 
            prod_price = '$prod_price',
            prod_cate_id = '$prod_cate_id',
            prod_date_chage = CURRENT_TIMESTAMP()
            WHERE prod_id = '$prod_id' ";
            // echo $sql_edit; exit;
        }
        else{
            // echo "chưa có img";exit;
            $sql_edit = "UPDATE product SET 
            prod_name = '$prod_name', 
            prod_detail = '$prod_detail', 
            prod_quantity = '$prod_quantity', 
            prod_origin = '$prod_origin',  
            prod_price = '$prod_price',
            prod_cate_id = '$prod_cate_id',
            prod_date_chage = CURRENT_TIMESTAMP()
            WHERE prod_id = '$prod_id' ";
            // echo $sql_edit; exit;
        }
        //thuc thi cau lenh
        mysqli_query($con, $sql_edit);
        move_uploaded_file($prod_image_tmp, '../assets/images/' . $path_image);
        header('location:adminProductMange.php');
    }
?>

<html>
    <head>
        <link rel="stylesheet " href="../assets/css/user_login.css">
    </head>
<body>
   
<div class="main">
    <form method="POST" action="update_product.php" enctype="multipart/form-data" class="form" id="form-1" style="margin: 30px auto 30px auto;">
        <h3 class="heading">Sửa sản phẩm</h3>
        <div class="spacer"></div>

        <div class="form-group">
            <label for="product_id" class="form-label">Mã sản phẩm</label>
            <input id="product_id" type="text" placeholder="Nhập mã sản phẩm" name="prod_id" class="form-control" value="<?php echo $r['prod_id']; ?>" readonly="true">
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label for="product_name" class="form-label">Tên sản phẩm</label>
            <input id="product_name" type="text" placeholder="Nhập tên sản phẩm" name="prod_name" class="form-control" value="<?php echo $r['prod_name']; ?>">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="product_detail" class="form-label">Chi tiết sản phẩm</label>
            <textarea id="product_detail" type="text" placeholder="Nhập chi tiết sản phẩm" name="prod_detail" class="form-control"><?php echo $r['prod_detail']; ?></textarea>
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="number" class="form-label">Số lượng sản phẩm</label>
            <input id="number" type="number" placeholder="Nhập số lượng sản phẩm" name="prod_quantity" class="form-control" value="<?php echo $r['prod_quantity']; ?>">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="origin" class="form-label">Xuất xứ</label>
            <input id="origin" type="text" placeholder="Nhập xuất xứ" name="prod_origin" class="form-control" value="<?php echo $r['prod_origin']; ?>">
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
            <label for="image" class="form-label">Hình ảnh</label>
            <input id="image" type="file" placeholder="" name="prod_image" accept="image/*" class="form-control" value="<?php echo $r['prod_image']; ?>">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Giá sản phẩm</label>
            <input id="price" type="number" placeholder="Nhập giá sản phẩm" name="prod_price" class="form-control" value="<?php echo $r['prod_price']; ?>">
            <span class="form-message"></span>
        </div>

        <button class="form-submit" name="submit">Sửa sản phẩm</button>
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