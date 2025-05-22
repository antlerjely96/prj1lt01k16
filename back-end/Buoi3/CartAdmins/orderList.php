<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order List</title>
</head>
<body>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Customer name</th>
            <th>Order date</th>
            <th>Order status</th>
            <th>Details</th>
        </tr>
        <?php
            //Lấy id của người đang đặt hàng
            $admin_id = $_SESSION['admin_id'];
            //Mở kết nối
            include_once "../Connection/open.php";
            //Viết sql
            $sql = "SELECT orders.*, admins.email FROM orders
                    INNER JOIN admins ON admins.id = orders.admin_id
                    WHERE orders.admin_id = '$admin_id'";
            //Chạy sql
            $orders = mysqli_query($connection, $sql);
            //Đóng kết nối
            include_once "../Connection/close.php";
            //Hiển thị
            foreach ($orders as $order) {
        ?>
            <tr>
                <td>
                    <?php echo $order['id']; ?>
                </td>
                <td>
                    <?php echo $order['email']; ?>
                </td>
                <td>
                    <?php echo $order['order_date']; ?>
                </td>
                <td>
                    <?php
                        if($order['order_status'] == 0) {
                            echo 'Đang xử lý';
                        } else if($order['order_status'] == 1) {
                            echo "Đang chuẩn bị hàng";
                        } else if($order['order_status'] == 2) {
                            echo "Đang giao hàng";
                        } else if($order['order_status'] == 3) {
                            echo "Đã giao hàng";
                        } else if($order['order_status'] == 4) {
                            echo "Đã hủy";
                        } else if($order['order_status'] == 5) {
                            echo "Hoàn hàng";
                        }
                    ?>
                </td>
                <td>
                    <a href="orderDetails.php?id=<?php echo $order['id'] ?>">Detail</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>