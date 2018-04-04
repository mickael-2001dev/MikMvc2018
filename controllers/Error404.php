<?php  

class Error404 extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function error()
	{
		$this->view->load('error404');
	}
}