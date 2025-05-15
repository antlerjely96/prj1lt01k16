<?php
    session_start();
    //Lấy thông tin được update
    $carts = $_POST["quantity"];
    //Update cart
    foreach ($carts as $id => $quantity) {
        $_SESSION['cart'][$id] = $quantity;
    }
    //Quay về danh sách
    header("Location: index.php");
?>