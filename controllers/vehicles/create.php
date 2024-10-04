<?php

require BASE_PATH . "Validator.php";

$config = require BASE_PATH . "config.php";

$db = new Database($config['database']);

$errors = [];

if($_SERVER["REQUEST_METHOD"] === "POST")
{

    //check for empty fields
    !Validator::string(value: $_POST['name'], min: 1, max: 100) ? $errors['name'] = 'Name between length of 3-100 is required' : '' ;
    strlen($_POST['price']) == 0 ? $errors['price'] = 'Price is required' : '';
    strlen($_POST['makeYear']) == 0 ? $errors['makeYear'] = 'Year is required' : '';
    strlen($_POST['color']) == 0 ? $errors['color'] = 'Color is required' : '';
    
    if (empty($errors)) {
        $db->query('INSERT INTO vehicles(name, price, make_year, color, vehicle_type_id, created_by) VALUES(:name, :price, :make_year, :color, :vehicle_type_id, :created_by)', [
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'make_year' => $_POST['makeYear'],
            'color' => $_POST['color'],
            'vehicle_type_id' => 1,
            'created_by' => 1,
        ]);
    }
}

view('vehicles/create.view.php', [
    'heading' => 'Create New Vehicle',
    'errors' => $errors
]);