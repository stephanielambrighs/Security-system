<?php

require_once(__DIR__ . "/../autoload.php");

class Db {
    private static $conn;

    // retrieve connection from the db that is retrieved from the settings file
    public static function getConnection()
    {
        include(__DIR__ . "/../settings/settings.php");
        if (self::$conn === null) {
            $host = $config['DB_HOST'];
            $dbname = $config['DB_DATABASE'];
            // $port = $config['DB_PORT'];
            self::$conn = new PDO(
                "mysql:host=$host;dbname=$dbname;",
                $config['DB_USERNAME'],
                $config['DB_PASSWORD']
            );
            $status = self::$conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
            return self::$conn;
        } else {
            return self::$conn;
        }
    }



}
