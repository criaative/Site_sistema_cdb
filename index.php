<?php

function __autoload($classe)
{
    if (file_exists("site/controllers/" . $classe . ".php")) {
        require_once "site/controllers/" . $classe . ".php";
    } else {
        require_once "site/models/" . $classe . ".php";
    }
}


    
$controller = isset($_GET['c']) ? ucfirst($_GET['c']) . "Controller" : 'SiteController';
$action = isset($_GET['a']) ? ucfirst($_GET['a']) : "index";



if (class_exists($controller)) {
    $route = new $controller();
    if (method_exists($route, $action)) {
        $route->$action();
    } else {
        print "Pagina nao encontrada";
    }
} else {
    print "Pagina nao encontrada";
}      