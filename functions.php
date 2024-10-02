<?php

if(!function_exists('dd')){
    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        
        die();
    }
}

if (!function_exists('urlIs')){
    function urlIs($value)
    {
        return $_SERVER['REQUEST_URI'] === $value ? 'border-bottom pb-2 ' : '';
    }
}

if (!function_exists('authorize')) {
    function authorize ($condition, $status = Response::FORBIDDEN)
    {
        if (! $condition) {
            abort($status);
        }
    }
}