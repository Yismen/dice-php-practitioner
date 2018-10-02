<?php

namespace Core;

class App
{
    private static $container = [];

    public static function bind($key, $value)
    {
        return self::$container[$key] = $value;
    }

    public static function resolve($key, $default = null)
    {
        if (array_key_exists($key, self::$container)) {
            return self::$container[$key];
        }

        return $default;
    }

    public static function container()
    {
        return self::$container;
    }
}
