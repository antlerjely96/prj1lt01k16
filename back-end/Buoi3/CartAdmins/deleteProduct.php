<?php
    session_start();
    //Lấy id của sản phẩm cần xóa
    $id = $_GET['id'];
    //Xóa trên cart
    unset($_SESSION['cart'][$id]);
    //Quay lại danh sách
    header("Location: index.php");
?>