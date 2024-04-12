<?php

namespace app\database\models;

use app\database\Transaction;
use PDO;
use PDOException;

abstract class Model 
{
    protected static string $table;

    public static function all(string $field = '*') 
    {
        
        try {
            Transaction::open();

            $conn = Transaction::getConnection();
            $tableName = static::$table;

            $query = $conn->prepare("select {$field} from {$tableName}");
            $query->execute();

            return $query->fetchAll(PDO::FETCH_CLASS, static::class);

            Transaction::close();
        } catch (PDOException $e) {
            Transaction::rollback();
        }

    }

}