<?php
    //Lấy dữ liệu trong form
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $brand_id = $_POST["brand_id"];
    //Mở kết nối
    include_once "../Connection/open.php";
    //Viết sql
    $sql = "INSERT INTO products (name, price, quantity, brand_id) VALUES ('$name', '$price', '$quantity', '$brand_id')";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Quay về danh sách
    header("location: index.php");
?>