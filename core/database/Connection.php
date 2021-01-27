<?php

namespace Core\Database;

class Connection
{
    public static function connect($config) {
        try {
            return new \PDO($config['connection'].';dbname='.$config['db_name'], $config['username'], $config['password'], $config['options']);
        } catch (\PDOException $error) {
            die($error->getMessage());
        }
    }
}
