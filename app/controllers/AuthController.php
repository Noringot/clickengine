<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../../config.php';
class AuthController extends Controller
{
    public static function isLogin(): bool
    {
        return isset($_SESSION["user"]["email"]);
    }
    public static function login($request): void
    {
        $email = $request["email"];
        $pass = $request["password"];

        $conn = self::getConn();
        $q = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $q->execute(['email' => $email]);
        $r = $q->fetch();

        if (hash("sha256", $pass) == $r["password"]) {
            $_SESSION["user"]["name"] = $r["name"];
            $_SESSION["user"]["email"] = $email;
            header("Location: /pages/home.php");
        } else {
            echo "Incorrect email or password";
        }
    }

    public static function register($request): void
    {
        $hashPass = hash("sha256", $request["password"]);
        $conn = self::getConn();
        $q = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $q->execute(['name' => $request["name"], 'email' => $request['email'], 'password' => $hashPass]);
        header("Location: /pages/signin.php");
    }

    public static function user(): array
    {
        if (!self::isLogin()) {
            return [];
        }

        return [
            'name' => $_SESSION['user']['name'],
            'email' => $_SESSION['user']['email'],
            ];
    }
}