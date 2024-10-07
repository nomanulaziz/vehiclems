<?php
use Core\Response;

    function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";
        
        die();
    }

    function pr($value) 
    {
        echo "<pre>";
        print_r($value);
        echo "</pre>";
    }

    function urlIs($value)
    {
        return $_SERVER['REQUEST_URI'] === $value ? 'border-bottom pb-2 ' : '';
    }


    function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }

    function authorize ($condition, $status = Response::FORBIDDEN)
    {
        if (! $condition) {
            abort($status);
        }
    }



    function show_error ($value)
    {
        if(isset($value)) {
            echo "<p class='text-danger small'>{$value}</p>";
        }
    }


// for loading files using base path

    function base_path($path)
    {
        return BASE_PATH . $path;
    }


// for providing views path

    function view($path, $attributes = [])
    {
        extract($attributes); //converts array keys into variables with corresponding values.
        // dd($heading);
        // print_r(base_path('views/' . $path)); echo "\n";
        require base_path('views/' . $path);
    }
