<?php

class AuthController {
    public function login() {
        print_r('login'); exit;

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Example logic for authenticating a user
        if ($email === 'user@example.com' && $password === 'password') {
            echo "Login successful! Welcome, $email.";
        } else {
            echo "Invalid credentials.";
        }
    }

    public function signup() {
        print_r('signup'); exit;

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $full_name = $_POST['full_name'];

        // Example logic for sign-up (validate and create user)
        if ($password === $confirm_password) {
            echo "Sign-up successful! Welcome, $full_name.";
        } else {
            echo "Passwords do not match.";
        }
    }
}
