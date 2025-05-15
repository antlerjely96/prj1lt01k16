<?php
    session_start();
    //Xóa giỏ hàng
    unset($_SESSION['cart']);
    //Quay về danh sách
    header("Location: index.php");
?>