<?php
namespace Http\Controllers;

use Core\App;
use Core\Authenticator;
use Core\Database;
use Http\Forms\LoginForm;

class Auth 
{
    protected $db = null;
    protected $auth = null;

    public function __construct() 
    {
        $this->db = App::resolve(Database::class);
        $this->auth = new Authenticator;
    }

    // ========================================================
    // Function to show login page
    // ========================================================
    public function create()
    {
        view('auth/login.view.php', [
            'errors' => $_SESSION['_flash']['errors'] ?? []
        ]);
    }

    // ========================================================
    // Function to validate stored login information
    // ========================================================
    public function login()
    {
        $form = LoginForm::validate($attributes = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ]);
        
        $signedIn = (new Authenticator)->attempt(
            $attributes['email'], $attributes['password']
        );
        
        if (! $signedIn) {
            $form->error(
                'password', 'No matching account found for that email address and password.'
                )->throw();
        }
        
        redirect('/');
    }

    // ========================================================
    // Function to logout the user
    // ========================================================
    public function logout()
    {
        $this->auth->logout();

        header('location: /');
        exit();
    }
}