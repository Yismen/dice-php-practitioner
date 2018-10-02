<?php

namespace Core\Database;

class Connection
{
    // private $PDO;

    // public function __construct($PDO)
    // {
    //     $this->PDO = $PDO;
    // }


    public static function make($connection)
    {
        try {
            return new \PDO(
                'mysql:host='.$connection['dbhost'].';dbname='.$connection['dbname'],
                $connection['username'],
                $connection['password'],
                $connection['options']
            );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
