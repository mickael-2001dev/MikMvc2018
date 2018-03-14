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
} /*else {
	$config->url = 'http://200.132.49.218'.$config->base_url;	
	$config->dbuser = '2017_mickaelbraz'; 
	$config->dbpassword = 'micka13022001el'; 
	$config->dbname ='2017_mickaelbraz';
	$config->host = '127.0.0.1';
	$config->drive = 'mysql';
}*/


//Login: adminMK
//Senha: admin1991
//Para testar o mailer subistitua o meu email pelo seu ;)

