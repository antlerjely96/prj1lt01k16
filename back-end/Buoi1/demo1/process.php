<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <?php
        //Lấy dữ liệu từ ô input có name là a, b, form chứa ô input đó có method là POST
        $a = $_POST['a'];
        $b = $_POST['b'];
        //Tính a + b
        $tong = $a + $b;
        //Tính a - b
        $hieu = $a - $b;
        //Tính a * b
        $tich = $a * $b;
        //Tính a / b
        $thuong = $a / $b;
    ?>
    <p> a + b = <?php echo $tong; ?></p>
    <p> a - b = <?php echo $hieu; ?></p>
    <p> a * b = <?php echo $tich; ?></p>
    <p> a / b = <?php echo $thuong; ?></p>
</body>
</html>