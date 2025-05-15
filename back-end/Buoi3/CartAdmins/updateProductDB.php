<?php
    session_start();
    //Mở kết nối
    include_once "../Connection/open.php";
    //Lấy id của tài khoản đang đăng nhập
    $adminId = $_SESSION['admin_id'];
    //Lấy cart_id của tài khoản
    //sql lấy cart_id
    $sqlGetCartId = "SELECT id FROM carts WHERE admin_id = '$adminId'";
    //Chạy sql
    $getCartIds = mysqli_query($connection, $sqlGetCartId);
    //Lấy cart_id
    foreach ($getCartIds as $getCartId) {
        $cartId = $getCartId['id'];
    }
    //Lấy product_id
    $productId = $_GET['id'];
    //Lấy quantity
    $quantity = $_GET['quantity'];
    if($_GET['operation'] == "minus"){
        $quantity -= 1;
    } else {
        $quantity += 1;
    }
    //sql
    $sql = "UPDATE cart_items SET quantity = '$quantity' WHERE cart_id = '$cartId' AND product_id = '$productId'";
    //Chạy sql
    mysqli_query($connection, $sql);
    //đóng kết nối
    include_once "../Connection/close.php";
    //Quay lại danh sách
    header("Location: index.php");
?>
?>