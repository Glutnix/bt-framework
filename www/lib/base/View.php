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

	public static function prettyDump ($var, $title="Debug") {
		if (HOST_TYPE != "live") {
			echo "<hr />";
			echo "<h3>" . $title ."</h3>";
			echo "<pre>";
			var_dump($var);
			echo "</pre>";
			echo "<hr />";
		}
	}

}