<?php
    session_start();
    //Lấy id của sản phẩm đang được update
    $id = $_GET['id'];
    //Lấy giá trị tăng hay giảm
    $operation = $_GET["operation"];
    if($operation == "minus"){
        $_SESSION['cart'][$id]--;
    } else if($operation == "plus") {
        $_SESSION['cart'][$id]++;
    }
    //Quay lại danh sách
    header("Location: index.php");
?>