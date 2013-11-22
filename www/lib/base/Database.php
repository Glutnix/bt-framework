<?php

class Database {

    protected static $db = false;

    public function __construct()
    {
        if (!$this->db) {
            try {
                $this->db = new PDO(DB_DSN, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }
}