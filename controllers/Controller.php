<?php
<<<<<<< HEAD

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Professor
 */
class Controller {
=======
namespace controllers;
use controllers\Error404 as Error404;
use controllers\Home as Home;
use controllers\News;
use views\View;

class Controller 
{
>>>>>>> b442fadf14c1f68df181f2de4ba066859a8429a3

    protected $config;
    private $query;
    protected $view;
    protected $model;

<<<<<<< HEAD
    public function __construct() {
=======
    public function __construct() 
    {
>>>>>>> b442fadf14c1f68df181f2de4ba066859a8429a3
        include 'config.php';
        $this->config = $config;
        $this->view = new View();
    }

    public function route($query = null) {
        $class = null;
        $this->query = $query;
        if ($this->query) {
            $this->query = explode('/', $this->query);
            $class_name = $this->query[0];
            if (count($this->query) > 1) {
                $method = $this->query[1];
            } else {
                $method = null;
            }
            $param = (count($this->query) > 2) ? $this->query[2] : null;
            if (class_exists($class_name)) {
                $class = new $class_name;
                if ($class instanceof Controller) {
                    if (method_exists($class, $method)) {
                        if ($param) {
                            $class->$method($param);
                        } else {
                            $class->$method();
                        }
                    } else {
                        if ($method === null or $method === "") {
                            if(method_exists($class, "index")){
                                $class->index();
                            } else {
                                $this->view->index(); 
                            }
                        } else {
                            $class = new Error404();
                            $class->error();
                       }
                    }
                }
            }
        }
        if ($this->query === null) {
            $class = new $this->config->defaultClass;
            $class->index();
        } elseif (!$class) {
            $class = new Error404();
            $class->error();            
        }
    }
    
    protected function reload()
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
<<<<<<< HEAD

    protected function location($location = null)
    {

        if($location == null) {
            $location = 'Admin';
        }

        header('Location: http://localhost/PopCulture/app/'.$location);
    } 
}
=======
}
>>>>>>> b442fadf14c1f68df181f2de4ba066859a8429a3
