<?php  
error_reporting(E_ALL ^ E_WARNING);

use controllers\Controller;
use controllers\Error404;
use controllers\Home;
use controllers\News;
use views\View;

function autoLoad($class) {
    $found = false;
    if (file_exists("$class.class.php")) {      
        require_once("$class.class.php");
        $found = true;
    } elseif (file_exists("$class.php")) {
        require_once("$class.php");
        $found = true;
    } else {
        $folders = ['models','views','controllers','lib'];
        foreach ($folders as $folder) {
            if(file_exists("$folder/$class.php")){
                require_once("$folder/$class.php");
                $found = true;
            } else if(file_exists("$folder/$class.class.php")){
                require_once("$folder/$class.class.php");
                $found = true;
            }
           
        }
        
    }
    return $found;
}
spl_autoload_register("autoLoad");
$controller = new Controller();
$controller->route(filter_input(INPUT_GET, 'query'));
