<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update a brand</title>
</head>
<body>
    <?php
        //Lấy id
        $id = $_GET['id'];
        //Kết nối db
        include_once "../Connection/open.php";
        //Viết sql
        $sql = "SELECT * FROM brands WHERE id = '$id'";
        //Chạy sql
        $brands = mysqli_query($connection, $sql);
        //Đóng kết nối
        include_once "../Connection/close.php";
        //Hiển thị dữ liệu lấy được
    ?>
    <form method="post" action="update.php">
        <?php
            foreach ($brands as $brand) {
        ?>
            <label for="id">ID: </label><input type="text" name="id" id="id" readonly value="<?php echo $brand['id']; ?>"><br>
            <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $brand['name']; ?>"><br>
            <label for="country">Country: </label><input type="text" name="country" id="country" value="<?php echo $brand['country']; ?>"><br>
        <?php
            }
        ?>
        <button>Update</button>
    </form>
</body>
</html>