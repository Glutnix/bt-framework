<?php

class NotFoundView extends BaseView
{

	protected $templateFile = "notFound";

	public function pageTitle()
	{
		echo $this->model->pageTitle;
	}

	public function pageHeader()
	{
		// nothing
	}

	public function pageContents()
	{
		$this->includeTemplate();
	}

	public function pageFooter()
	{
		// nothing
	}

}