<?php
    // echo 'da vao';exit;
    require "./connect.php"; // Kết nối database      
    function generate_random_character() {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $shuffled_characters = str_shuffle($characters);
        $random_characters = substr($shuffled_characters, 0, 10);
        return $random_characters;
    }
    // Sử dụng hàm để sinh một ký tự ngẫu nhiên
    $random_char = generate_random_character();
    // echo $random_char;
    session_start();
        if (isset($_POST['add'])) {
            // echo 'da vao'; exit;
            if(isset($_POST['quantity']) && $_POST['quantity'] > 0){
                if (isset($_GET['id'])) { // kiểm tra id sản phẩm được add
                    $id = $_GET['id'];
                    $quantity = $_POST['quantity']; // Số lượng sản phẩm do người dùng nhập
                    
                    $sql = "SELECT * FROM product WHERE prod_id = '$id'";
                    // echo $sql;exit;
                    $rs = $con->query($sql);
                    foreach($rs as $row){
                        $prod_price = ($row['prod_price']);
                        $sl = ($row['prod_quantity']);
                            // echo $sl;exit;
                        $gia = ($row['prod_price']);
                    }
                    // $soluong = (count($rs->fetch_assoc()));
                    // $rs = mysqli_query($con, $query);
                    if ($rs) { // Kiểm tra xem truy vấn có thành công không
                        // if($soluong > 0){
                            if ($rs -> num_rows > 0) {                
                                $sql = "SELECT * FROM product";
                                $rs = $con->query($sql);
                                    foreach($rs as $row){ 
                                        $prod_id = ($row['prod_id']);
                                    }
                                        $total= $quantity*$prod_price;
                                        $userId = $_COOKIE['userId'];
                                            // select trong order để kiểm tra 
                                            // var_dump($prod_id,$prod_price,$quantity,$total);
                                            $sql_order = "SELECT * FROM orders where prod_id='$id' AND user_id='$userId'";
                                            $rs_order = $con->query($sql_order);
                                            foreach($rs_order as $r ){
                                                $i = ($r['prod_id']);
                                                $sl_daco = ($r['order_numberOfItem']);
                                                $status = ($r['order_status']);
                                                // echo $sl_daco; exit;
                                            }
                                                if($i == '' || $status == '1'){
                                                    $newItemPet = $sl - $quantity;
                                                    // echo $newItemPet; exit;
                                                    $sql_insert= "INSERT INTO orders (order_id, order_date, order_total, order_numberOfItem, user_id, order_status, prod_id) 
                                                    VALUES ('$random_char',CURRENT_TIMESTAMP(),'$total','$quantity','$userId','$id')";
                                                    $insert = $con->query($sql_insert);

                                                    $sql_up = "UPDATE product SET prod_quantity = '$newItemPet' WHERE prod_id='$id'";
                                                    $up = $con->query($sql_up);
                                                    echo "<script>alert('This product added success!  with $quantity ');location.href='./cart.php'</script>";
                                                }
                                                else {
                                                    $newItem = $sl_daco + $quantity;
                                                    $total = $newItem*$gia;
                                                    $sql_update = "UPDATE orders SET order_numberOfItem = '$newItem', order_total = '$total' WHERE prod_id='$id' AND user_id='$userId'";
                                                    $update = $con->query($sql_update);
                                                    
                                                    $newItemPet = $sl - $quantity; //update so luong trong product
                                                    // echo $newItemPet;exit;
                                                    $sql_up = "UPDATE product SET prod_quantity = '$newItemPet' WHERE prod_id='$id'";
                                                    $up = $con->query($sql_up);
                                                    echo "<script>alert('This product was add with $quantity ');location.href='./cart.php'</script>";
                                                }       
                            } else {
                                echo "<script>alert('Can't find the product, Please contact us');location.href='./index.php'</script>";
                            }
                        // }
                        } else {
                            echo "<script>alert('Lỗi kết nối');location.href='./index.php'</script>";
                            // Xử lý lỗi truy vấn không thành công
                        }
                }
            } else{
                echo "<script>alert('Nhập ít nhất 1');location.href='./index.php'</script>";
            }
        }