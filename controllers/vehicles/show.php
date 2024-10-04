<?php
$config = require BASE_PATH . "config.php";

$db = new Database($config['database']);

$currentUserId = 1;

// dd($db->query('select * from vehicles'));
$vehicle = $db->query('select * from vehicles where id = :id', [
    'id' => $_GET['id']
    ])->findOrFail();


authorize($vehicle['created_by'] == $currentUserId);

require BASE_PATH . "views/vehicles/show.view.php";

view('vehicles/show.view.php', [
    'vehicle' => $vehicle
]);