<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

$db = App::resolve(Database::class);

$errors = [];

//check for empty fields
!Validator::string(value: $name, min: 1, max: 100) ? $errors['name'] = 'Name between length of 3-100 is required' : '' ;
!Validator::email(value: $email) ? $errors['email'] = 'Valid email is required' : '' ;
!Validator::string(value: $password, min: 8, max: 100) ? $errors['password'] = 'Password Between length 8-100 is required' : '' ;

if ($password !== $confirm_password) {
    $errors['confirm_password'] = "Passwords do not match";
}
if (! empty($errors)) {
    //validation issue
    return view('auth/signup.view.php', [
        'errors' => $errors
    ]);
}

// Check If account already exists

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if($user) {
    //someone with the same user name already exists.
    $errors['user_exists'] = "User with email already exists. Try another email or instead Login.";

    return view('auth/signup.view.php', [
        'errors' => $errors
    ]);

    exit();
} else {
    // If no, save to db , and then log the user in, and redirect.

    $db->query('INSERT INTO users(name, email, password, role) VALUES(:name, :email, :password, :role)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'role' => 'viewer',
    ]);

    // store user in session
    login(['name' => $name]);

    header('location: /');
    exit();
}