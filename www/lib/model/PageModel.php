<?php

class PageModel extends Model
{

	public $data = array();
	public $messages = array();

	public function __construct() {
		parent::__construct();
		// check for form submission

		// populate $this->data with $_POST

		// validate form, setting $this->messages for view to render.

		// commit to database if no problems
	}

	public function getOne ( $slug )
	{
		$statement = $this->db->prepare("SELECT * FROM pages WHERE slug = :slug");
		$statement->bindParam(":slug", $slug);
		$this->db->executeStatement($statement);
		$this->data = $statement->fetch();
		return $this->data;
	}


}