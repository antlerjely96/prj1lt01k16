<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details</title>
</head>
<body>
    <table border="1px" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <td>Product id</td>
            <td>Product name</td>
            <td>Product image</td>
            <td>Price</td>
            <td>Quantity</td>
        </tr>
        <?php
            //Lấy id của order
            $id = $_GET['id'];
            //Mở kết nối
            include_once "../Connection/open.php";
            //Viết sql
            $sql = "SELECT products.id, products.name, products.image, order_details.price, order_details.quantity FROM order_details
                    INNER JOIN products ON order_details.product_id = products.id
                    WHERE order_details.order_id = '$id'";
            //Chạy sql
            $orderDetails = mysqli_query($connection, $sql);
            //Đóng kết nối
            include_once "../Connection/close.php";
            //Hiển thị
            foreach ($orderDetails as $orderDetail) {
        ?>
            <tr>
                <td>
                    <?php echo $orderDetail['id'] ?>
                </td>
                <td>
                    <?php echo $orderDetail['name'] ?>
                </td>
                <td>
                    <img src="../image/<?php echo $orderDetail['image'] ?>" alt="image" width="100px" height="100px">
                </td>
                <td>
                    <?php echo $orderDetail['price'] ?>
                </td>
                <td>
                    <?php echo $orderDetail['quantity'] ?>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <a href="changeStatus.php?id=<?php echo $id; ?>">Change status</a>
</body>
</html>