<?php

class PageView extends BaseView
{

	protected $templateFile = "page";

	public function pageContents()
	{
		if ($this->model->data) {
			$this->includeViewTemplate();
		} else {
			echo "No page found with slug ".$_GET['page'].".";
		}
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