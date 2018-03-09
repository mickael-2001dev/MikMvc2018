<?php  
error_reporting(E_ALL ^ E_WARNING);
use controllers\Controller;
function autoLoad($class) {
    $found = false;
    if (file_exists("$class.class.php")) {
        include_once "$class.class.php";
        $found = true;
    } elseif (file_exists("$class.php")) {
        include_once "$class.php";
        $found = true;
    } else {
       //$folders = getFolders();//Muito lento
        $folders = ['models','views','controllers','lib'];//Procurar em pastas principais
        foreach ($folders as $folder) {
            if (file_exists("$folder/$class.class.php")) {
                include_once "$folder/$class.class.php";
                $found = true;
                return $found;
            } elseif (file_exists("$folder/$class.php")) {
                    include_once "$folder/$class.php";
                    $found = true;
                    return $found; 
            }
        }
    }
    return $found;
}
spl_autoload_register("autoLoad");
$controller = new Controller();
$controller->route(filter_input(INPUT_GET, 'query'));