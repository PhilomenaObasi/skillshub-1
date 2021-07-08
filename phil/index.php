<?php
define("BASE_PATH", dirname(__FILE__));
include_once 'park/inaki.php';
include_once 'lib/airplay.php';
$anglebar = Inaki::innakki();
$routes = array();
$routes = explode('/', filter_var($anglebar, FILTER_SANITIZE_STRING) . '/');


if (isset($routes[1])) {
    
    if($routes[1] == ''){
        include_once 'src/index.php';
    }elseif ($routes[1] != '') {
        $page= BASE_PATH. '/src/'.strtolower($routes[1].'.php');
        if(file_exists($page)){
            include_once $page;
    } else {
            echo '404';
    } 
        
    }
    
    
   
} else {
    
    echo '404';
}