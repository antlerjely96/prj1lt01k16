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
    <h1>Cart (Session)</h1>
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
                <tr>
                    <td colspan="7">
                        <a href="checkOut.php">Check out</a>
                    </td>
                </tr>
            <?php
                }
            ?>
        </table>
    </form>

    <br>
    <br>
    <br>

    <h1>Cart (DB)</h1>
    <form method="post" action="updateCartDB.php">
        <table border="1px" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
            </tr>
            <?php
            //Lấy id của tài khoản đang đăng nhập
            $admin_id = $_SESSION['admin_id'];
            //sql
            $sql = "SELECT cart_items.product_id, cart_items.quantity, products.name, products.image, products.price 
                    FROM carts
                    INNER JOIN cart_items ON carts.id = cart_items.cart_id
                    INNER JOIN products ON products.id = cart_items.product_id
                    WHERE carts.admin_id = '$admin_id'";
            //Chạy sql
            $carts = mysqli_query($connection, $sql);
            //Hiển thị
            foreach ($carts as $cart) {
                ?>
                <tr>
                    <td>
                        <?php echo $cart['product_id']; ?>
                    </td>
                    <td>
                        <?php echo $cart['name']; ?>
                    </td>
                    <td>
                        <img src="../image/<?php echo $cart['image']; ?>" width="100px" height="100px" alt="Image">
                    </td>
                    <td>
                        <a href="updateProductDB.php?id=<?php echo $cart['product_id'] ?>&&operation=minus&&quantity=<?php echo $cart['quantity']; ?>"> - </a>
                        <input type="text" name="cart[<?php echo $cart['product_id'] ?>]" value="<?php echo $cart['quantity']; ?>">
                        <a href="updateProductDB.php?id=<?php echo $cart['product_id'] ?>&&operation=plus&&quantity=<?php echo $cart['quantity']; ?>"> + </a>
                    </td>
                    <td>
                        <?php echo $cart['price']; ?>
                    </td>
                    <td>
                        <a href="deleteProductDB.php?id=<?php echo $cart['product_id'] ?>">Delete product</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td colspan="4">
                    <button>Update Cart</button>
                </td>
                <td colspan="3">
                    <a href="deleteCartDB.php">Delete Cart</a>
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <a href="checkOutDB.php">Check out</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>