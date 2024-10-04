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

if (!function_exists('show_error')) {
    function show_error ($value)
    {
        if(isset($value)) {
            echo "<p class='text-danger small'>{$value}</p>";
        }
    }
}

// for loading files using base path
if(!function_exists('base_path')) {
    function base_path($path)
    {
        return BASE_PATH . $path;
    }
}

// for providing views path
if(!function_exists('view')) {
    function view($path, $attributes = [])
    {
        extract($attributes); //converts array keys into variables with corresponding values.
        // dd($heading);
        require base_path('views/' . $path);
    }
}