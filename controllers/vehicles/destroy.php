<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$vehicle = $db->query('select * from vehicles where id = :id', [
'id' => $_POST['id']
])->findOrFail();
    
    
authorize($vehicle['created_by'] == $currentUserId);

//form submitted delete the note.
$db->query('delete from vehicles where id = :id', [
    'id' => $_POST['id']
]);

//redirect to vehicles page
header('location: /vehicles');
exit;
