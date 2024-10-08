<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

// dd($db->query('select * from vehicles'));
$vehicle = $db->query('select * from vehicles where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


authorize($vehicle['created_by'] == $currentUserId);

view('vehicles/edit.view.php', [
    'heading' => 'Edit Vehicle Details',
    'errors' => [],
    'vehicle' => $vehicle
]);