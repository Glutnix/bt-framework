<?php

abstract class BaseView extends View
{

	public $pageTitle;

	public function render()
	{
		$this->includeViewTemplate("base");
	}

	public function includeViewTemplate($templateFile = NULL)
	{
		if (is_null($templateFile)) {
			$templateFile = $this->templateFile;
		}
		include PATH_TEMPLATE . "/" . $templateFile . ".php";
	}

	public function pageTitle()
	{
		echo $this->model->data['title'] . " :: " . SITE_NAME;
	}

	protected function pageDescription()
	{
		echo $this->model->data['description'];
	}

	protected function pageKeywords()
	{
		echo $this->model->data['keywords'];
	}

	public function pageHeader()
	{
		if (isset($this->model->data['header'])) {
			echo $this->model->data['header'];
		}
	}

	public function pageFooter()
	{
		if (isset($this->model->data['footer'])) {
			echo $this->model->data['footer'];
		}
	}

	abstract public function pageContents();


	/* UTILITY FUNCTIONS */

	public static function wrapTextinParagraphElements($content)
	{
		return self::wrapTextinElements($content, '<p>', '</p>');
	}

	public static function wrapTextinListElements($content)
	{
		return self::wrapTextinElements($content, '<li>', '</li>');
	}

	public static function wrapTextinElements($content, $openTag = "<li>", $closeTag = "</li>")
	{
		$paragraphs = "";
		preg_match_all("/^(.+)$/m", $content, $lines);
		foreach ($lines[0] as $line) {
			$line = trim($line);
			if (strlen($line) > 0) {
				$paragraphs .= $openTag . $line . $closeTag . "\n";
			}
		}
		return $paragraphs;
	}

}