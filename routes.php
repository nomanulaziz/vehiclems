<?php

$router->get('/', 'index.php');

$router->get('/vehicles', 'vehicles/index.php')->only('auth');

$router->get('/vehicle', 'vehicles/show.php');
$router->delete('/vehicle', 'vehicles/destroy.php');

$router->get('/vehicle/create', 'vehicles/create.php');
$router->post('/vehicles', 'vehicles/store.php');

$router->get('/vehicle/edit', 'vehicles/edit.php');
$router->patch('/vehicle', 'vehicles/update.php');

$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

// Authentiaction Routes
$router->get('/signup', 'registration/create.php')->only('guest');
$router->post('/signup', 'registration/store.php')->only('guest');

$router->get('/login', 'sessions/create.php')->only('guest');
$router->post('/login', 'sessions/store.php')->only('guest');

$router->delete('/logout', 'sessions/destroy.php')->only('auth');