<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// dd($uri);


$routes = [
    '/' => '../controllers/index.php',
    '/vehicles' => '../controllers/vehicles.php',
    '/vehicle' => '../controllers/vehicle.php',
    '/about' => '../controllers/about.php',
    '/contact' => '../controllers/contact.php',
    '/login' => '../controllers/login.php',
    '/signup' => '../controllers/signup.php',
];


function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    }
    else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "../views/{$code}.php";

    die();
}

routeToController($uri, $routes);