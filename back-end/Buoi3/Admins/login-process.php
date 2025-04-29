<?php
    session_start();
    //Lấy email, pwd từ form
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Mở kết nối
    include_once "../Connection/open.php";
    //Viết sql
    $sql = "SELECT *, COUNT(id) AS count_id FROM admins WHERE email = '$email' AND password = '$password'";
    //Chạy sql
    $results = mysqli_query($connection, $sql);
    //Đóng kết nối
    include_once "../Connection/close.php";
    //Kiểm tra xem email, pwd có đúng hay không
    foreach ($results as $result) {
        if($result['count_id'] == 0){
            //Quay về trang login
            header("Location: login.php");
        } else {
            //Lưu account lên session
            $_SESSION['admin_id'] = $result['id'];
            $_SESSION['admin_email'] = $result['email'];
            //Quay về danh sách brands
            header("Location: ../Brands/index.php");
        }
    }
?>