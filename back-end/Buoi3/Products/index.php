<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product's List</title>
</head>
<body>
    <p>
        <a href="#"> Trang chủ</a> > <a href="#">Danh sách sản phẩm</a>
    </p>
    <form method="get" action="">
        <?php
            //Lấy giá trị đang search
            if(isset($_GET["keyword"])){
                $keyword = $_GET["keyword"];
            } else {
                $keyword = "";
            }
        ?>
        <input type="text" name="keyword" placeholder="Search..." value="<?php echo $keyword; ?>">
        <button>Search</button>
    </form>
    <a href="create.php">Add a product</a>
    <table border="1px" cellspacing="0" cellpadding="0" width="80%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Brand</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            //Mở kết nối
            include_once "../Connection/open.php";
            //Số bản ghi trong 1 trang
            $recordsPerPage = 3;
            //Query lấy được tổng số bản ghi
            $sqlCountRecords = "SELECT COUNT(*) AS total_records FROM products
                                WHERE products.name LIKE '%$keyword%'";
            //Chạy sql
            $countRecords = mysqli_query($connection, $sqlCountRecords);
            //Lấy tổng số bản ghi
            foreach ($countRecords as $countRecord) {
                $totalRecords = $countRecord["total_records"];
            }
            //Tính được tổng số trang
            $pages = ceil($totalRecords / $recordsPerPage);
            //Lấy trang hiện tại
            if(isset($_GET["page"])){
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            //Vị trí bắt đầu của từng trang
            $start = ($page - 1) * $recordsPerPage;
            //Viết sql
            $sql = "SELECT products.*, brands.name AS brand_name 
                    FROM products INNER JOIN brands 
                    ON brands.id = products.brand_id
                    WHERE products.name LIKE '%$keyword%'
                    LIMIT $start, $recordsPerPage";
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
                    <img src="../image/<?php echo $product["image"] ?>" alt="product image">
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
    <?php
        for ($page = 1; $page <= $pages; $page++) {
            if($keyword == ""){
    ?>
        <a href="?page=<?php echo $page; ?>">
            <?php echo $page; ?>
        </a>
    <?php
        } else {
    ?>
        <a href="?page=<?php echo $page; ?>&&keyword=<?php echo $keyword; ?>">
            <?php echo $page; ?>
        </a>
    <?php
            }
        }
    ?>
</body>
</html>