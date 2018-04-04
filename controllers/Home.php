<?php  

class Home extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index() 
	{
		$data['title'] = "Pop Culture Brasil";

		$this->view->load('header', $data);
		$this->view->load('nav');
		$this->view->load('index');
		$this->view->load('footer');

	}
}