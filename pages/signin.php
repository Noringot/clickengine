<?php
session_start();
require_once __DIR__ . '/../app.php';

if (AuthController::isLogin()) {
    header("Location: " . "/pages/home.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/signin.css">
    <title>Document</title>
</head>
<body>
    <h1>SignIn page</h1>

        <form class="form" action="<?= "/auth/login"?>" method="post">
            <div class="form__field form__email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form__field password">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Submit</button>
        </form>
    <p>Not have a account? <a href="signup.php">Register here</a></p>

</body>
</html>
