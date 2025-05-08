<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a product</title>
</head>
<body>
    <?php
        //Mở kết nối
        include_once "../Connection/open.php";
        //Viết sql
        $sql = "SELECT * FROM brands";
        //Chạy sql
        $brands = mysqli_query($connection, $sql);
        //Đóng kết nối
        include_once "../Connection/close.php";
    ?>
    <p>
        <a href="#"> Trang chủ</a> > <a href="#">Thêm sản phẩm</a>
    </p>
    <form method="post" action="store.php" enctype="multipart/form-data">
        <label for="name">Name: </label><input type="text" name="name" id="name"><br>
        <label for="image">Image: </label><input type="file" name="image" id="image"><br>
        <label for="price">Price: </label><input type="text" name="price" id="price"><br>
        <label for="quantity">Quantity: </label><input type="text" name="quantity" id="quantity"><br>
        <label for="brand_id">Brand: </label>
        <select id="brand_id" name="brand_id">
            <?php
                foreach ($brands as $brand) {
            ?>
                <option value="<?php echo $brand["id"]; ?>">
                    <?php echo $brand["name"]; ?>
                </option>
            <?php
                }
            ?>
        </select><br>
        <button>Add</button>
    </form>
</body>
</html>