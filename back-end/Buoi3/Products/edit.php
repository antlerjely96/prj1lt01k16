<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update a product</title>
</head>
<body>
    <?php
        //Mở kết nối
        include_once "../Connection/open.php";
        //Viết sql lấy dữ liệu ở bảng brands
        $sqlBrand = "SELECT * FROM brands";
        //Chạy sql
        $brands = mysqli_query($connection, $sqlBrand);
        //Lấy id của bản ghi cần sửa
        $id = $_GET["id"];
        //Viết sql lấy dữ liệu của bản ghi cần sửa
        $sqlProduct = "SELECT * FROM products WHERE id = '$id'";
        //Chạy sql
        $products = mysqli_query($connection, $sqlProduct);
        //Đóng kết nối
        include_once "../Connection/close.php";
    ?>
    <form method="post" action="update.php">
        <?php
            foreach ($products as $product) {
        ?>
            <input type="hidden" name="id" value="<?php echo $product["id"]; ?>" />
            <label for="name">Name: </label><input type="text" name="name" id="name" value="<?php echo $product["name"]; ?>"><br>
            <label for="price">Price: </label><input type="text" name="price" id="price" value="<?php echo $product["price"]; ?>"><br>
            <label for="quantity">Quantity: </label><input type="text" name="quantity" id="quantity" value="<?php echo $product["quantity"]; ?>"><br>
            <label for="brand_id">Brand: </label>
            <select id="brand_id" name="brand_id">
                <?php
                foreach ($brands as $brand) {
                    ?>
                    <option value="<?php echo $brand["id"]; ?>"
                        <?php
                            if($brand["id"] == $product["brand_id"]){
                        ?>
                            selected="selected"
                        <?php
                            }
                        ?>
                    >
                        <?php echo $brand["name"]; ?>
                    </option>
                    <?php
                }
                ?>
            </select><br>
        <?php
            }
        ?>
        <button>Update</button>
    </form>
</body>
</html>