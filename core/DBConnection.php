<?php

class DBConnection
{
    public static function start()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "php_dev";

        return $conn = new mysqli($servername, $username, $password, $database);
        if ($conn->connect_error) {
            die("connection failed: " . $conn->connect_error);
        }
    }
}
