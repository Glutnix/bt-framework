<?php

abstract class Model
{
	private $db;

	public function __construct()
	{
		$this->connectToDatabase();
	}

	public function connectToDatabase()
	{
		$this->db = new Database();
	}

}