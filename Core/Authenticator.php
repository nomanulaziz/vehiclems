<?php

namespace Core;

class Authenticator 
{
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);

        // Check If user credentials match
        $user = $db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email,
        ])->find();

        // // dd($user);
        if($user) {
            // password and hash verification (built in function)
            if(password_verify($password, $user['password'])) 
            {
                // mark that the user has logged-in
                $this->login(['name' => $user['name'], 'id' => $user['id']]);

                return true;
            }
        } 
        return false;
    }

    public function login($user)
    {
        return $_SESSION['user'] = [
            'name' => $user['name'],
            'id' => $user['id'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
       Session::destroy();
    }
}