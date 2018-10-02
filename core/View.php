<?php

namespace Core;

class View
{
    public static function make($view, $data = [], $from = 'resources/views/')
    {
        $view = self::parse($view);
        
        extract($data);

        require $from.$view.'.view.php';
    }

    private static function parse($name)
    {
        $name = trim($name, '/');

        return $name = str_replace('.', '/', $name);
    }
}
