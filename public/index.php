<?php

use Core\Session;

session_start();

const BASE_PATH = __DIR__.'/../'; 

// print_r(BASE_PATH);

require BASE_PATH . "Core/functions.php";

// we will autoload these below now
// require base_path("Database.php");
// require base_path("Core/Response.php");

// autoloading Database.php
spl_autoload_register(function ($class) {
    // $class = Core\Database
    // if(str_contains($class, 'Core')) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    // } else {
    //     $class = "Core\\" . $class;
    // }
   
    require base_path("{$class}.php"); // BASE_PATH . Core/Database.php
});

require base_path("bootstrap.php");

// require base_path("Core/Router.php");
$router = new \Core\Router();

$routes = require base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

Session::unflash();