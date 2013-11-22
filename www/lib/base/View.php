<?php

abstract class View
{

	protected $model;

	public function __construct($model)
	{
		$this->model = $model;
	}

	abstract public function render();

	public function returnRender()
	{
		ob_flush();
		ob_start();
		$this->render();
		return ob_get_flush();
	}

}