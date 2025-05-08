<?php
    //Lấy dữ liệu từ form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $image = $_FILES["image"]["name"];
//    die($image);
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $brand_id = $_POST["brand_id"];
    //Mở kết nối
    include_once "../Connection/open.php";
    //Viết sql
    if($image == null){
        $sql = "UPDATE products SET name = '$name', price = '$price', quantity = '$quantity', brand_id = '$brand_id' WHERE id = '$id'";
    } else {
        $sql = "UPDATE products SET name = '$name', image = '$image', price = '$price', quantity = '$quantity', brand_id = '$brand_id' WHERE id = '$id'";
    }
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Quay về danh sách
    header("Location: index.php");
?>