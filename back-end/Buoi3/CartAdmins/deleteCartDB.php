<?php
    session_start();
    //Mở kết nối
    include_once '../Connection/open.php';
    //Lấy id của tài khoản đang đăng nhập
    $adminId = $_SESSION['admin_id'];
    //sql lấy cart_id
    $sqlGetCartId = "SELECT id FROM carts WHERE admin_id = '$adminId'";
    //Chạy sql
    $getCartIds = mysqli_query($connection, $sqlGetCartId);
    //Lấy cart_id
    foreach ($getCartIds as $getCartId) {
        $cartId = $getCartId['id'];
    }
    //sql
    $sql = "DELETE FROM cart_items WHERE cart_id = '$cartId'";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once '../Connection/close.php';
    //Quay lại danh sách
    header("Location: index.php");
?>