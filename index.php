<?php  
error_reporting(E_ALL ^ E_WARNING);

use controllers\Controller;
use controllers\Error404;
use controllers\Home;
use controllers\News;
use views\View;

function autoLoadWindows($class) {
    $found = false;
    if (file_exists("$class.class.php")) {      
        require_once("$class.class.php");
        $found = true;
    } elseif (file_exists("$class.php")) {
        require_once("$class.php");
        $found = true;
    } else {
        require_once("$class.php");
    }
    return $found;
}

function autoLoadUnix($class) {
    $found = false;
    if (file_exists("$class.class.php")) {      
        require_once(str_replace('\\', '/',"$class.class.php"));
        $found = true;
    } elseif (file_exists("$class.php")) {
        require_once(str_replace('\\', '/',"$class.php"));
        $found = true;
    } else {
        require_once(str_replace('\\', '/',"$class.php"));
       /** CASO NÃO USE NAMESPACE
        $folders = getFolders();//Muito lento
        $folders = ['models','views','controllers','lib'];//Procurar em pastas principais
       foreach ($folders as $folder) {
            if (file_exists("$folder/$class.class.php")) {
                require_once(str_replace('\\', '/',"$folder/$class.class.php"));
                $found = true;
                return $found;
            } elseif (file_exists("$folder/$class.php")) {
                    require_once(str_replace('\\', '/',"$folder/$class.php"));
                   $found = true;
                    return $found; 
            }
        }
        **/
    }
    return $found;
}
if(stripos("win",$_SERVER["SERVER_SOFTWARE"])){
    spl_autoload_register("autoLoadWindows");
}else{
    spl_autoload_register("autoLoadUnix");
}
$controller = new Controller();
$controller->route(filter_input(INPUT_GET, 'query'));
