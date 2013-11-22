<?php

abstract class BaseView extends View
{

	public $pageTitle;

	public function render()
	{
		$this->includeTemplate("base");
	}

	public function includeTemplate($templateFile = NULL)
	{
		if (is_null($templateFile)) {
			$templateFile = $this->templateFile;
		}
		include PATH_TEMPLATE . "/" . $templateFile . ".php";
	}

	protected function pageTitle()
	{
		echo $this->pageTitle;
	}

	protected function pageDescription()
	{
		echo $this->pageDescription;
	}

	protected function pageKeywords()
	{
		echo $this->pageKeywords;
	}

	abstract public function pageHeader();

	abstract public function pageContents();

	abstract public function pageFooter();

}