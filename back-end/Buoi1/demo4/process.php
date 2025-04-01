<?php
    //Lấy dữ liệu
    $a = $_POST["a"];
    //Hiển thị
    if($a < 0){
        for ($i = $a; $i <= 0; $i++) {
            if($i == 0){
                echo $i;
            } else {
                echo $i . ",";
            }
        }
    } else {
        for ($i = 0; $i <= $a; $i++) {
            if($i == $a){
                echo $i;
            } else {
                echo $i . ",";
            }
        }
    }
?>