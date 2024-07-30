<?php
namespace App\Classes;

use classes\DatabaseConfig;

class DataBase
{
    private static $connection = null;

    private function __construct() {}
    private function __clone() {}


    public static function connection()
    {
        if (self::$connection === null)
        {
            self::$connection = new \PDO("mysql:host=localhost;dbname=petprojects","root", "");
        }

        return self::$connection;
    }
}
