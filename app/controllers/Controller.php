<?php

class Controller
{
    public static function getConn(): PDO
    {
        try {
            return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
        } catch (\PDOException $e) {
            die("Connection error: {$e->getMessage()}");
        }
    }
}
