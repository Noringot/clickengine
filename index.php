<?php
session_start();
print_r($_SERVER);
die();
require_once 'app.php';

$routes = [];

function route(string $path, callable $callback): void
{
    global $routes;
    $routes[$path] = $callback;
}

route('/', function () {
    if (AuthController::isLogin()) {
        header("Location: " . URL . "pages/home.php");
    }
    header("Location: " . URL . "pages/signup.php");
});

route('/auth/login', function () {
    if($_SERVER["REQUEST_METHOD"] !== "POST") {
        echo "Not support this method";
        return;
    }
    $req = [];
    $req["email"] = $_POST["email"];
    $req["password"] = $_POST["password"];

    AuthController::login($req);
});

route('/auth/register', function () {
    if($_SERVER["REQUEST_METHOD"] !== "POST") {
        echo "Not support this method";
        return;
    }

    $req = [];
    $req["name"] = $_POST["name"];
    $req["email"] = $_POST["email"];
    $req["password"] = $_POST["password"];

    AuthController::register($req);
});

route('/auth/logout', function () {
    unset($_SESSION["user"]);
    header("Location: " . URL);
});

route('/404', function () {
    echo "Page not found";
});

run();

function run() {
    global $routes;
    $uri = $_SERVER['REQUEST_URI'];


    if (isset($routes[$uri])) {
        $callback = $routes[$uri];
    } else {
        $callback = $routes['/404'];
    }
    $callback();
}