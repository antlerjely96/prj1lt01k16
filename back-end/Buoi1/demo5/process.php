<?php
    $n = $_POST['n'];
    $giaiThua = 1;
    if($n < 0){
        echo 'Giai thừa không tính được';
    } else{
        for($i = 1; $i <= $n; $i++){
            $giaiThua *= $i;
        }
        echo 'Giai thừa của n là: '.$giaiThua;
    }
?>
