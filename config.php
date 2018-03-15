<?php 
unset($config);
$config = new stdClass();
$config->defaultClass = "Home";
$config->base_url = '/mvc2018/app';
$config->asset = $config->base_url.'view/templates/';
$config->template = 'default';

if($_SERVER['HTTP_HOST'] == 'localhost') {
	$config->url = 'http://localhost'.$config->base_url;
	$config->dbuser = 'root'; 
	$config->dbpassword = ''; 
	$config->dbname ='mvc-mika';
	$config->host = 'localhost';
	$config->drive = 'mysql';
} 
