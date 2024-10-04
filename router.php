<?php
$routes = require BASE_PATH .  "routes.php";

function routeToController($uri, $routes)
{
    // check if the key $uri (e.g. /, /about, /contact) 
    // exists in the array $routes from routes.php
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

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd($uri);

routeToController($uri, $routes);