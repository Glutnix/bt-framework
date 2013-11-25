<?php

class PageView extends BaseView
{

	protected $templateFile = "page";

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

}