<?php  
namespace controllers;
use models\News as NewsModel;

class News extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->model = new NewsModel;
	}

	public function index() 
	{
		$data['news'] = $this->model->getAll();
		$this->view->load('news', $data);
	}
}