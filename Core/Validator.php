<?php
namespace Core;

class Validator {

    public static function string (mixed $value, int $min = 1, int $max = 1000)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email (mixed $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}