<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// dd($db->query('select * from vehicles'));
$vehicles = $db->query('select * from vehicles where created_by = 1')->get();

view('vehicles/index.view.php', [
    'heading' => 'My Vehicles',
    'vehicles' => $vehicles
]);