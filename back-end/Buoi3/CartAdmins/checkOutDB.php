<?php
    session_start();
    //Lấy id của người đang đặt hàng
    $adminId = $_SESSION['admin_id'];
    //Mở kết nối
    include_once '../Connection/open.php';
    /* Lấy cart */
    //Viết sql
    $sqlGetCart = "SELECT cart_items.product_id, cart_items.quantity FROM carts 
                    INNER JOIN cart_items ON carts.id = cart_items.cart_id
                    WHERE admin_id = '$adminId'";
    //Chạy sql
    $carts = mysqli_query($connection, $sqlGetCart);
    /* Lưu dữ liệu lên bảng orders */
    //Lấy ngày đặt hàng
    $orderDate = date("Y-m-d");
    //Status = 0
    $orderStatus = 0;
    //Viết sql
    $sqlSaveOrder = "INSERT INTO orders(order_date, order_status, admin_id)
                    VALUES ('$orderDate', '$orderStatus', '$adminId')";
    //chạy sql
    mysqli_query($connection, $sqlSaveOrder);
    /* Lấy id của order vừa được tạo */
    //Viết sql
    $sqlGetOrderIds = "SELECT MAX(id) AS order_id FROM orders WHERE admin_id = '$adminId'";
    //Chạy sql
    $getOrderIds = mysqli_query($connection, $sqlGetOrderIds);
    //Lấy order_id
    foreach ($getOrderIds as $getOrderId){
        $orderId = $getOrderId['order_id'];
    }
    /* Lưu order_details */
    foreach ($carts as $cart){
        $productId = $cart['product_id'];
        $quantity = $cart['quantity'];
        /* Lấy giá của sản phẩm */
        //Viết sql
        $sqlGetPrice = "SELECT price FROM products WHERE id = '$productId'";
        //Chạy sql
        $getPrices = mysqli_query($connection, $sqlGetPrice);
        //Lấy price
        foreach ($getPrices as $getPrice){
            $price = $getPrice['price'];
        }
        /* Lưu dữ liệu lên order_details */
        //Viết sql
        $sqlSaveOrderDetails = "INSERT INTO order_details(order_id, product_id, quantity, price)
                                VALUES ('$orderId', '$productId', $quantity, $price)";
        //Chạy sql
        mysqli_query($connection, $sqlSaveOrderDetails);
    }
    /* Xóa cart */
    //Viết sql
    $sqlDeleteCartItems = "DELETE FROM cart_items WHERE cart_id IN (SELECT id FROM carts WHERE admin_id = '$adminId')";
    //Chạy sql
    mysqli_query($connection, $sqlDeleteCartItems);
    //Viết sql
    $sqlDeleteCart = "DELETE FROM carts WHERE admin_id = '$adminId'";
    //Chạy sql
    mysqli_query($connection, $sqlDeleteCart);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Quay về danh sách đơn hàng
    header("Location: orderList.php");
?>