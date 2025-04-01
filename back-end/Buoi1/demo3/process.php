<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <?php
        //lấy a, b, c
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];
        $result = "";
        //Tính
        if($a == 0){
            if($b == 0){
                if($c == 0){
                    $result = "Vô số nghiệm";
                } else {
                    $result = "Vô nghiệm";
                }
            } else {
                $x = (-$c) / $b;
                $result = "x = " . $x;
            }
        } else {
            $delta = pow($b, 2) - 4 * $a * $c;
            if($delta < 0){
                $result = "Vô nghiệm";
            } elseif ($delta == 0){
                $x = (-$b) / (2 * $a);
                $result = "x = " . $x;
            } else {
                $x1 = (-$b + sqrt($delta)) / (2 * $a);
                $x2 = (-$b - sqrt($delta)) / (2 * $a);
                $result = "x<sub>1</sub> = " . $x1 . ", x<sub>2</sub> = " . $x2;
            }
        }
        echo $result;
    ?>
</body>
</html>