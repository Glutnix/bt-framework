<?php

class Database
{

    protected static $pdo = false;

    public function __construct()
    {
        if (!self::$pdo) {
            try {
                self::$pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }

    public function prepare($query)
    {
        $statement = self::$pdo->prepare($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement;
    }

    public function executeStatement(&$statement) {
        $statement->execute();
    }

}