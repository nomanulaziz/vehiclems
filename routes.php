<?php

$router->get('/', 'Home/index');
$router->get('/vehicles', 'Vehicles/index')->only('auth');
$router->get('/vehicle', 'Vehicles/show');
$router->get('/vehicle/create', 'Vehicles/create');
$router->post('/vehicles', 'Vehicles/store');
$router->get('/vehicle/edit', 'Vehicles/edit');
$router->patch('/vehicle', 'Vehicles/update');
$router->delete('/vehicle', 'Vehicles/destroy');
$router->get('/about', 'Pages/about');
$router->get('/contact', 'Pages/contact');

// Authentication Routes
$router->get('/register', 'Registration/create')->only('guest');
$router->post('/register', 'Registration/store')->only('guest');
$router->get('/login', 'Auth/create')->only('guest');
$router->post('/login', 'Auth/login')->only('guest');
$router->delete('/logout', 'Auth/logout')->only('auth');
