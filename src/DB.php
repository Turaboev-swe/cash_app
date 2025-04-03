<?php
declare(strict_types=1);


use Dotenv\Dotenv;

class DB
{
    public static function connect(): mysqli
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        $mysqli = new mysqli($host, $username, $password, $dbname);

        if ($mysqli->connect_error) {
            die("Ulanishda xato: " . $mysqli->connect_error);
        }

        return $mysqli;
    }
}
