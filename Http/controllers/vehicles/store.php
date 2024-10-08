<?php
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

//check for empty fields
!Validator::string(value: $_POST['name'], min: 1, max: 100) ? $errors['name'] = 'Name between length of 3-100 is required' : '' ;
!Validator::string(value: $_POST['price'], min: 1, max: 20) ? $errors['price'] = 'Price is required' : '' ;
!Validator::string(value: $_POST['makeYear'], min: 1, max: 4) ? $errors['makeYear'] = 'Valid Year is required' : '' ;
!Validator::string(value: $_POST['color'], min: 1, max: 100) ? $errors['color'] = 'Color is required' : '' ;
// strlen($_POST['name']) == 0 ? $errors['name'] = 'Name is required' : '';
// strlen($_POST['price']) == 0 ? $errors['price'] = 'Price is required' : '';
// strlen($_POST['makeYear']) == 0 ? $errors['makeYear'] = 'Year is required' : '';
// strlen($_POST['color']) == 0 ? $errors['color'] = 'Color is required' : '';

if (! empty($errors)) {
    //validation issue
    return view('vehicles/create.view.php', [
        'heading' => 'Add New Vehicle',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO vehicles(name, price, make_year, color, vehicle_type_id, created_by) VALUES(:name, :price, :make_year, :color, :vehicle_type_id, :created_by)', [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'make_year' => $_POST['makeYear'],
    'color' => $_POST['color'],
    'vehicle_type_id' => 1,
    'created_by' => 1,
]);

header('location: /vehicles');
die();
