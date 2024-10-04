<?php
$config = require BASE_PATH . "config.php";

$db = new Database($config['database']);

// dd($db->query('select * from vehicles'));
$vehicles = $db->query('select * from vehicles where created_by = 1')->get();

view('vehicles/index.view.php', [
    'heading' => 'Vehicles',
    'vehicles' => $vehicles
]);