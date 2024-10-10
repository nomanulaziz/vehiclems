<?php
namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function add($method, $uri, $controllerAction)
    {
        $this->routes[] = [
            'uri' => $uri, 
            'controllerAction' => $controllerAction, 
            'method' => $method, 
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controllerAction)
    {
        return $this->add('GET', $uri, $controllerAction);
    }

    public function post($uri, $controllerAction)
    {
        return $this->add('POST', $uri, $controllerAction);
    }

    public function delete($uri, $controllerAction)
    {
        return $this->add('DELETE', $uri, $controllerAction);
    }

    public function patch($uri, $controllerAction)
    {
        return $this->add('PATCH', $uri, $controllerAction);
    }

    public function put($uri, $controllerAction)
    {
        return $this->add('PUT', $uri, $controllerAction);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] == $uri && $route['method'] == strtoupper($method)) {
                // Apply middleware
                Middleware::resolve($route['middleware']);
                
                // Call the controller and method
                return $this->callAction($route['controllerAction']);
            }
        }

        // If no route is matched, abort with a 404
        $this->abort();
    }

    protected function callAction($controllerAction)
    {
        // Split the controller and action
        list($controller, $action) = explode('/', $controllerAction);

        // Build the full controller class name
        $controller = "Http\\Controllers\\" . $controller;

        if (!class_exists($controller)) {
            throw new \Exception("Controller {$controller} not found");
        }

        // Instantiate the controller
        $controller = new $controller;

        // If action method is not specified, default to 'index'
        if (!method_exists($controller, $action)) {
            throw new \Exception("Action {$action} not found in controller {$controller}");
        }

        // Call the action method
        return $controller->$action();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }

    public function previousUrl()
    {
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
