<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brand list</title>
</head>
<body>
    <?php
        include_once "../layouts/header.php";
    ?>
    <?php
        //Mở kết nối đến DB
        include_once "../Connection/open.php";
        //Viết sql lấy dữ liệu
        $sql = "SELECT * FROM brands";
        //Chạy query
        $brands = mysqli_query($connection, $sql);
        //Đóng kết nối đến DB
        include_once "../Connection/close.php";
        //Hiển thị dữ liệu
    ?>
    <a href="create.php">Add a brand</a>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Country</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            foreach ($brands as $brand) {
        ?>
            <tr>
                <td>
                    <?php echo $brand['id']; ?>
                </td>
                <td>
                    <?php echo $brand['name']; ?>
                </td>
                <td>
                    <?php echo $brand['country']; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $brand['id']; ?>">Edit</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $brand['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <?php
        include_once "../layouts/footer.php";
    ?>
</body>
</html>