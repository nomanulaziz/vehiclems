<?php

class Router {
    private $routes = [];

    // Register a GET route
    public function get($url, $action) {
        echo "Registering route: $url\n"; // Debug URL registration
        $this->routes['GET'][$url] = $action;
    }

    // Register a POST route
    public function post($url, $action) {
        echo "Registering route: $url\n"; // Debug URL registration
        $this->routes['POST'][$url] = $action;
    }

    // Dispatch based on URL and request method
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];

        // Remove base folder ('/vehiclems') and clean up the URL by removing the query string
        $url = str_replace('/vehiclems', '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $url = trim($url, '/');  // Remove any leading/trailing slashes

        echo "Cleaned URL: $url\n"; // Debug cleaned URL

        // Check if the URL matches the registered routes
        // Check if the URL exactly matches the registered route
        foreach ($this->routes[$method] as $registeredUrl => $action) {
            echo "Comparing $url with $registeredUrl\n"; // Debug comparison
            if ($url === $registeredUrl) {
                echo "Matched route: $registeredUrl\n";
                // Call the matched action
                if (is_callable($action)) {
                    call_user_func($action);
                } elseif (strpos($action, '@') !== false) {
                    list($controller, $method) = explode('@', $action);
                    require_once "../controllers/{$controller}.php";
                    $controllerInstance = new $controller();
                    $controllerInstance->$method();
                }
                return;  // Stop processing once a match is found
            }
        }
        echo '404 Not Found';  // No match found

    }

}
