<?php

class PageModel extends Model {

	public function getAll()
	{

	}

	public function getOne ( $slug )
	{
		$statement = $this->db->prepare("SELECT * FROM pages WHERE slug = :slug");
		$statement->bindParam(":slug", $slug);
		if (!$statement->execute()) {
			$this->displayError($statement);
		}
		$this->data = $statement->fetch();
		return $this->data;
	}


}