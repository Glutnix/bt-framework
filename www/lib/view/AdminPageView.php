<?php

class AdminPageView extends BaseView
{

	protected $templateFile = "page-admin";

	public function pageContents()
	{
		$this->includeViewTemplate();
	}

	public function pageFooter()
	{
		// nothing
	}

	public function title()
	{
		echo $this->model->data['title'];
	}

	public function content()
	{
		echo $this->wrapTextinParagraphElements($this->model->data['content']);
	}

	public function formURL() {
		echo htmlentities($_SERVER['REQUEST_URI']);
	}

}