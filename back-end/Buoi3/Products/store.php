<?php
    //Lấy dữ liệu trong form
    $name = $_POST["name"];
    $image = $_FILES["image"]["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $brand_id = $_POST["brand_id"];
    //Mở kết nối
    include_once "../Connection/open.php";
    //Viết sql
    $sql = "INSERT INTO products (name, image, price, quantity, brand_id) VALUES ('$name', '$image', '$price', '$quantity', '$brand_id')";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Kiểm tra nếu ảnh chưa có trong folder image thì copy ảnh vào
    if(!file_exists("../image/" . $image)){
        //Lấy path
        $path = $_FILES["image"]["tmp_name"];
        //Lưu ảnh vào thư mục image
        move_uploaded_file($path, "../image/" . $image);
    }
    //Quay về danh sách
    header("location: index.php");
?>