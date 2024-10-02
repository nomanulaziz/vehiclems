<?php
$config = require "../config.php";

$db = new Database($config['database']);

$heading = 'Vehicle';
$currentUserId = 1;

// dd($db->query('select * from vehicles'));
$vehicle = $db->query('select * from vehicles where id = :id', [
    'id' => $_GET['id']
    ])->findOrFail();


authorize($vehicle['created_by'] == $currentUserId);

require "../views/vehicle.view.php";