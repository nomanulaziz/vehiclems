<?php

class Router {
    private $routes = [];

    // Register a GET route
    public function get($url, $action) {
        $this->routes['GET'][$url] = $action;
    }

    // Register a POST route
    public function post($url, $action) {
        $this->routes['POST'][$url] = $action;
    }

    // Dispatch based on URL and request method
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        if (isset($this->routes[$method][$url])) {
            $action = $this->routes[$method][$url];
            if (is_callable($action)) {
                call_user_func($action);
            } elseif (strpos($action, '@') !== false) {
                list($controller, $method) = explode('@', $action);
                require_once "../controllers/{$controller}.php";
                $controllerInstance = new $controller();
                $controllerInstance->$method();
            }
        } else {
            echo '404 Not Found';
        }
    }
}
