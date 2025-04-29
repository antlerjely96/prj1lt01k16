<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product's List</title>
</head>
<body>
    <a href="create.php">Add a product</a>
    <table border="1px" cellspacing="0" cellpadding="0" width="80%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            //Mở kết nối
            include_once "../Connection/open.php";
            //Viết sql
            $sql = "SELECT products.*, brands.name AS brand_name FROM products INNER JOIN brands ON brands.id = products.brand_id";
            //Chạy sql
            $products = mysqli_query($connection, $sql);
            //Đóng kết nối
            include_once "../Connection/close.php";
            //Hiển thị dữ liệu lấy được
            foreach ($products as $product){
        ?>
            <tr>
                <td>
                    <?php echo $product["id"] ?>
                </td>
                <td>
                    <?php echo $product["name"] ?>
                </td>
                <td>
                    <?php echo $product["price"] ?>
                </td>
                <td>
                    <?php echo $product["quantity"] ?>
                </td>
                <td>
                    <?php echo $product["brand_name"] ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $product["id"]; ?>">Edit</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $product["id"]; ?>">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>