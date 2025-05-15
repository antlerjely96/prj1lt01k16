<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
</head>
<body>
    <form method="post" action="updateCart.php">
        <table border="1px" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            <?php
                $total = 0;
                //Mở kết nối
                include_once "../Connection/open.php";
                //Lấy giỏ hàng hiện tại
                if(isset($_SESSION['cart'])){
                    $carts = $_SESSION['cart'];
                    //Hiển thị giỏ hàng
                    foreach ($carts as $id => $quantity){
                        //Viết sql lấy thông tin sản phẩm có trên giỏ hàng
                        $sql = "SELECT * FROM products WHERE id = '$id'";
                        //Chạy sql
                        $products = mysqli_query($connection, $sql);
                        //Lấy giá, ảnh của sản phẩm
                        foreach ($products as $product) {
            ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $product['name']; ?>
                    </td>
                    <td>
                        <img src="../image/<?php echo $product['image']; ?>" width="100px" height="100px" alt="Image">
                    </td>
                    <td>
                        <?php echo $product['price']; ?>
                    </td>
                    <td>
                        <a href="updateProduct.php?id=<?php echo $id ?>&&operation=minus"> - </a>
                        <input type="text" name="quantity[<?php echo $id ?>]" value="<?php echo $quantity; ?>">
                        <a href="updateProduct.php?id=<?php echo $id ?>&&operation=plus"> + </a>
                    </td>
                    <td>
                        <?php
                            echo $product['price'] * $quantity;
                            $total += $product['price'] * $quantity;
                        ?>

                    </td>
                    <td>
                        <a href="deleteProduct.php?id=<?php echo $id ?>">Delete product</a>
                    </td>
                </tr>
            <?php
                        }
                    }
            ?>
                <tr>
                    <td colspan="7">
                        Total: <?php echo $total ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <button>Update Cart</button>
                    </td>
                    <td colspan="3">
                        <a href="deleteCart.php">Delete Cart</a>
                    </td>
                </tr>
            <?php
                }
                //Đóng kết nối
                include_once "../Connection/close.php";
            ?>
        </table>
    </form>
</body>
</html>