<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['admin_email'])){
            header('Location: ../Brands/index.php');;
        }
    ?>
    <form method="post" action="login-process.php">
         <label for="email">Email: </label><input type="email" name="email" id="email"><br>
         <label for="password">Password: </label><input type="password" name="password" id="password"><br>
        <button>Login</button>
    </form>
</body>
</html>