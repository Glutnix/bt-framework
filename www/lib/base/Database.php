<?php

class Database {

    protected static $pdo = false;

    public function __construct()
    {
        if (!$this->pdo) {
            try {
                $this->pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }

    public function prepare($query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return $statement;
    }

}