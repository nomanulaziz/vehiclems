<?php

use Core\App;
use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) 
{
    $auth = new Authenticator;

    if (! $auth->attempt($email, $password)) {
        redirect('/login');
    }
    
    $form->error('email', 'Email or Password do not match');
}

Session::flash('errors', $form->getErrors());

return redirect('/login');

//validation issue
// return view('auth/login.view.php', [
//     'errors' => $form->getErrors()
// ]);
