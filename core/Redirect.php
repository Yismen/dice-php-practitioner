<?php

namespace Core;

class Redirect
{
    public static function to($path)
    {
        $instance = new self;

        header('Location: '.$path);

        return $instance;
    }

    public static function with($array)
    {
        $instance = new self;

        // header('Location: '.$path);

        return $instance;
    }
}
