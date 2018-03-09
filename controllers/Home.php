<?php  
namespace controllers;
class Home extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index() 
	{
		echo "Bem Vindo a Home!";
	}
}