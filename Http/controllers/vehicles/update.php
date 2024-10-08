<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;
// === find the corresponding vehicle ===
$vehicle = $db->query('select * from vehicles where id = :id', [
'id' => $_POST['id']
])->findOrFail();


// === check user authorization ===
authorize($vehicle['created_by'] == $currentUserId);

// === validate the input ===
$errors = [];

//check for empty fields
!Validator::string(value: $_POST['name'], min: 1, max: 100) ? $errors['name'] = 'Name between length of 3-100 is required' : '' ;
!Validator::string(value: $_POST['price'], min: 1, max: 20) ? $errors['price'] = 'Price is required' : '' ;
!Validator::string(value: $_POST['makeYear'], min: 1, max: 4) ? $errors['makeYear'] = 'Valid Year is required' : '' ;
!Validator::string(value: $_POST['color'], min: 1, max: 100) ? $errors['color'] = 'Color is required' : '' ;

if (count($errors)) {
    //validation issue
    return view('vehicles/edit.view.php', [
        'heading' => 'Edit Vehicle Details',
        'errors' => $errors,
        'vehicle' => $vehicle
    ]);
}

// === if no validation update the record ===
$rowsAffected = $db->query('UPDATE vehicles SET name = :name, price = :price, make_year = :make_year, color = :color WHERE id = :id', [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'make_year' => $_POST['makeYear'],
    'color' => $_POST['color'],
]);

// === redirect ===
if($rowsAffected > 0) {
    header('location: /vehicles');
    die();
} else {
    echo "Database Exception: Record not updated";
}
