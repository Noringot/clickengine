<?php
require_once __DIR__ . '/../app.php';
session_start();

if (!AuthController::isLogin()) {
    header("Location: /");
}

$user =  AuthController::user();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Home page</h1>
    <p>Name: <?= $user["name"] ?></p>
    <p>Email: <?= $user["email"] ?></p>
    <form action="<?= "/auth/logout" ?>" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
