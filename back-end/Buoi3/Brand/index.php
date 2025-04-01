<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brand list</title>
</head>
<body>
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
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Country</th>
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
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>