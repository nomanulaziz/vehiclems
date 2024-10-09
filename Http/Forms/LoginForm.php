<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm 
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        //check for empty fields
        !Validator::email(value: $attributes['email']) ? $this->errors['email'] = 'Valid email is required' : '' ;
        !Validator::string(value: $attributes['password'], min: 3) ? $this->errors['password'] = 'Valid password is required' : '' ;
    }

    public static function validate($attributes)
    {
        
        $instance = new static($attributes);

        //if form is not valid throw errors
        //otherwise return the instance
        return $instance->failed() ? $instance->throw() : $instance;

    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}