<?php 
unset($config);
$config = new stdClass();
$config->defaultClass = "Home";
$config->base_url = '/PopCulture/app/';
$config->asset = $config->base_url.'views/templates/';
$config->template = 'default';

if($_SERVER['HTTP_HOST'] == 'localhost') {
	$config->url = 'http://localhost'.$config->base_url;
	$config->dbuser = 'root'; 
	$config->dbpassword = ''; 
	$config->dbname ='pop-culture';
	$config->host = 'localhost';
	$config->drive = 'mysql';
} 
