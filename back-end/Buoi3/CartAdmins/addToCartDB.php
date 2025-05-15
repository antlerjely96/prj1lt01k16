<?php
    session_start();
    //Mở kết nối
    include_once "../Connection/open.php";
    //Lấy id của tài khoản đang đăng nhập
    $adminId = $_SESSION['admin_id'];
    //Lấy id của sản phẩm đang được thêm lên cart
    $productId = $_GET['id'];
    //Kiểm tra trên DB tồn tại cart của tài khoản này hay chưa
    //SQL lấy thông tin từ bảng cart với admin_id
    $sqlCheckCart = "SELECT *, COUNT(id) AS count_id FROM carts WHERE admin_id = '$adminId'";
    //Chạy SQL
    $checkCarts = mysqli_query($connection, $sqlCheckCart);
    //Check cart
    foreach ($checkCarts as $checkCart) {
        //Nếu cart chưa tồn tại thì tạo ra giỏ hàng
        if($checkCart['count_id'] == 0){
            //Viết SQL tạo ra cart của tài khoản đang đăng nhập
            $sqlCreateCart = "INSERT INTO carts (admin_id) VALUES ('$adminId')";
            //Chạy sql
            mysqli_query($connection, $sqlCreateCart);
            //Lấy id của cart vừa được tạo
            //Viết SQL lấy id của cart cừa được tạo của tài khoản
            $sqlGetCartId = "SELECT id FROM carts WHERE admin_id = '$adminId'";
            //Chạy query
            $getCartIds = mysqli_query($connection, $sqlGetCartId);
            //Lấy cart_id
            foreach ($getCartIds as $getCartId) {
                $cartId = $getCartId['id'];
            }
            //Kiểm tra trong giỏ hàng đã tồn tại sản phẩm này chưa
            //Viết SQL
            $sqlCheckProduct = "SELECT *, COUNT(product_id) AS count_product FROM cart_items WHERE cart_id = '$cartId' AND product_id = '$productId'";
            //Chạy sql
            $checkProducts = mysqli_query($connection, $sqlCheckProduct);
            foreach ($checkProducts as $checkProduct) {
                if($checkProduct['count_product'] == 0){
                    //Tạo product trong cart
                    $quantity = 1;
                    //sql
                    $sql = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES ('$cartId', '$productId', '$quantity')";
                } else {
                    $quantity = $checkProduct['quantity'] + 1;
                    //sql
                    $sql = "UPDATE cart_items SET quantity = '$quantity' WHERE cart_id = '$cartId' AND product_id = '$productId'";
                }
                mysqli_query($connection, $sql);
            }
        } else {
            //Viết SQL lấy id của cart của tài khoản
            $sqlGetCartId = "SELECT id FROM carts WHERE admin_id = '$adminId'";
            //Chạy query
            $getCartIds = mysqli_query($connection, $sqlGetCartId);
            //Lấy cart_id
            foreach ($getCartIds as $getCartId) {
                $cartId = $getCartId['id'];
            }
            //Kiểm tra trong giỏ hàng đã tồn tại sản phẩm này chưa
            //Viết SQL
            $sqlCheckProduct = "SELECT *, COUNT(product_id) AS count_product FROM cart_items WHERE cart_id = '$cartId' AND product_id = '$productId'";
            //Chạy sql
            $checkProducts = mysqli_query($connection, $sqlCheckProduct);
            foreach ($checkProducts as $checkProduct) {
                if($checkProduct['count_product'] == 0){
                    //Tạo product trong cart
                    $quantity = 1;
                    //sql
                    $sql = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES ('$cartId', '$productId', '$quantity')";
                } else {
                    $quantity = $checkProduct['quantity'] + 1;
                    //sql
                    $sql = "UPDATE cart_items SET quantity = '$quantity' WHERE cart_id = '$cartId' AND product_id = '$productId'";
                }
                mysqli_query($connection, $sql);
            }
        }
    }
    //Quay về danh sách
    header("Location: index.php");
?>