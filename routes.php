<?php

$router->get('/', 'controllers/index.php');

$router->get('/vehicles', 'controllers/vehicles/index.php');

$router->get('/vehicle', 'controllers/vehicles/show.php');
$router->delete('/vehicle', 'controllers/vehicles/destroy.php');

$router->get('/vehicle/create', 'controllers/vehicles/create.php');
$router->post('/vehicles', 'controllers/vehicles/store.php');

$router->get('/vehicle/edit', 'controllers/vehicles/edit.php');
$router->patch('/vehicle', 'controllers/vehicles/update.php');

$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/login', 'controllers/login.php');
$router->get('/signup', 'controllers/signup.php');

$router->delete('/vehicle', 'controllers/vehicles/destroy.php');