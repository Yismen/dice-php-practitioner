<?php

use Core\Redirect;

function dd($var)
{
    return die(
        var_dump($var)
    );
}

function view($view, $data = [], $from = 'resources/views/')
{
    return Core\View::make($view, $data, $from);
}

function redirect($path)
{
    return Redirect::to($path);
}

function config($name,  $default = null)
{
    $name = str_replace('.', '/', $name);
    
    return require 'config/'.$name.'.php';
}

function str_slug($string, $separator = '-')
{
    $string = str_replace(' ', $separator, 
        trim(
            strtolower($string), ' '
        )
    );

    return $string;
}

function env($var, $default = null)
{
    $array =  require '.env.php';

    if (array_key_exists($var, $array)) {
        return $array[$var];
    }

    return $default;

}