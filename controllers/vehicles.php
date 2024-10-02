<?php
$config = require "../config.php";

$db = new Database($config['database']);

// dd($db->query('select * from vehicles'));
$vehicles = $db->query('select * from vehicles where created_by = 1')->get();

$heading = 'Vehicles';

require "../views/vehicles.view.php";