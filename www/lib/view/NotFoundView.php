<?php

class NotFoundView extends BaseView
{

	protected $templateFile = "notFound";

	public function pageContents()
	{
		$this->includeViewTemplate();
	}

	public function content()
	{
		echo $this->model->data['content'];
	}


}