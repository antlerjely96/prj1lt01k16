<?php
    //Lấy id của đơn hàng
    $id = $_GET['id'];
    //Mở kết nối
    include_once "../Connection/open.php";
    /* lấy trạng thái hiện tại của order */
    //Viết sql lấy trạng thái hiện tại của order
    $sqlGetStatus = "SELECT order_status FROM orders WHERE id = '$id'";
    //Chạy sql
    $getStatuses = mysqli_query($connection, $sqlGetStatus);
    //Lấy status hiện tại
    foreach ($getStatuses as $getStatus ) {
        $currentStatus = $getStatus['order_status'];
    }
    $status = 5;
    //Xét status hiện tại
    if($currentStatus == 0){
        $status = 1;
    } else if ($currentStatus == 1){
        $status = 2;
    } else if ($currentStatus == 2){
        $status = 3;
    } else if ($currentStatus == 3){
        $status = 4;
    } else if ($currentStatus == 4){
        $status = 5;
    }
    //Viết sql
    $sql = "UPDATE orders SET order_status = '$status' WHERE id = '$id'";
    //Chạy sql
    mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Quay về danh sách đơn hàng
    header("Location: orderList.php");
?>