<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Session;

class FormHandler
{
    protected $errors = [];
    protected $attributes;

    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    public static function validate(array $attributes, callable $validationRules)
    {
        $instance = new static($attributes);

        // Apply the validation rules (this allows dynamic rule checking for any form)
        $validationRules($instance);

        // If the form validation fails, throw the errors
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function addError($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }

    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    // This method stores the old form data in session for reuse
    public static function old($field)
    {
        return Session::get('old')[$field] ?? '';
    }

    // Store old form data in session after a validation failure
    public function flashOldData()
    {
        Session::flash('old', $this->attributes);
    }
}
