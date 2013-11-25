<?php

abstract class Model
{
    protected $db;
    public $data;

    public function __construct()
    {
        $this->connectToDatabase();
    }

    public function connectToDatabase()
    {
        $this->db = new Database();
    }

}