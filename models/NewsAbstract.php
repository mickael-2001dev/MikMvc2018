<?php  

class NewsAbstract
{
	private $title;
	private $article;
	private $id;

	public function __construct($title, $article, $id = null)
	{
		$this->title = $title;
		$this->article = $article;
		$this->id = $id;
	}

	public function getId() 
	{
		return $this->id;
	}

	public function getTitle() 
	{
		return $this->title;
	}

	public function getArticle() 
	{
		return $this->article;
	}

	public function setId($val)
	{
		$this->id = $val;
	}

	public function setTitle($val)
	{
		$this->title = $val;
	}

	public function setArticle($val)
	{
		$this->article = $val;
	}
}