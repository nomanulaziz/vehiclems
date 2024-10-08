<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm 
{
    protected $errors = [];

    public function validate($email, $password)
    {
        //check for empty fields
        !Validator::email(value: $email) ? $this->errors['email'] = 'Valid email is required' : '' ;
        !Validator::string(value: $password, min: 3) ? $this->errors['password'] = 'Valid password is required' : '' ;

        return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}