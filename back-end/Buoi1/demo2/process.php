<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <?php
        //Lấy age
        $age = $_POST['age'];
        $result = '';
        //Kiểm tra
        if(0 <= $age && $age < 6){
            $result = 'Mẫu giáo';
        } elseif ($age < 11) {
            $result = 'Cấp 1';
        } elseif ($age < 15) {
            $result = 'Cấp 2';
        } elseif ($age < 18){
            $result = 'Cấp 3';
        } elseif($age < 23){
            $result = 'Cao đẳng, đại học';
        } else {
            $result = 'Gia nhập thị trường lao động';
        }
    ?>
    <p> Đang ở giai đoạn: <?php echo $result; ?></p>
</body>
</html>