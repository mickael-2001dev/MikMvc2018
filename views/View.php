<?php

class View 
{
    //put your code here
    private $base_url;
    private $url;
    private $asset;
    private $template;

    public function __construct() 
    {
        include 'config.php';
        if ($config) {
            $this->base_url = $config->base_url;
            $this->url  = $config->url;
            $this->asset = $config->asset;
            $this->template = $config->template;
            $this->asset.=$this->template . "/";
        }
    }
    
    public function index()
    {
        $this->location($this->url);
    }

<<<<<<< HEAD
    public function load($page, $data = null)
=======
    public function load($page, $data = null) 
>>>>>>> b442fadf14c1f68df181f2de4ba066859a8429a3
    {
        include_once "views/templates/" . $this->template . "/$page.php";
    }

    public function setTemplate($template) 
    {
        include 'config.php';
        $this->asset = $config->asset;
        $this->template = $template;
         $this->asset.=$this->template . "/";
    }
    
    public function location($url)
    {
         header("Location: $url");
    }

}
