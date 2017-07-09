<?php

namespace Core;

class Request
{
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/')
        ;
    }

    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function all()
    {
        return $_REQUEST;
    }

    public static function imput($key)
    {
        if (array_key_exists($key, $_REQUEST)) {
            return $_REQUEST[$key];
        }

        return null;
    }

    public static function get($key)
    {
        return self::imput($key);
    }

    public static function only(array $fields)
    {
        $output = [];
        foreach ($fields as $key) {
            if (self::imput($key)) {
                $output[$key] = self::imput($key);
            }
        }

        return $output;
    }
}