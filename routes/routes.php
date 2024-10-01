<?php 

include_once 'Router.php';

$router = new Router();

// Define the route for the homepage (views/index.php)
$router->get('/', function() {
    include '../views/index.php';
});

// Define the route for the login page
$router->get('login', function() {
    include '../views/auth/login.php'; // Auth page will be dynamic for both login and signup
});

// Define the route for the signup page
$router->get('signup', function() {
    include '../views/auth/signup.view.php';
});

// Define the route for the about page
$router->get('about', function() {
    include '../views/about.view.php';
});

// Define login and signup form submissions
$router->post('auth/login', 'AuthController@login');
$router->post('auth/signup', 'AuthController@signup');

// Dispatch the router
$router->dispatch();
