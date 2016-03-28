<?php

namespace ViewComponents\Doctrine\Test\Helper;

use Doctrine\DBAL\Driver\PDOSqlite\Driver;

class Connection
{
    private static $connection;

    public static function get()
    {
        if (self::$connection === null) {
            self::$connection = new \Doctrine\DBAL\Connection(
                [
                    'pdo' => \ViewComponents\TestingHelpers\dbConnection(),
                ],
                new Driver
            );
        }
        return self::$connection;
    }
}