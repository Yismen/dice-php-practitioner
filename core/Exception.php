<?php

namespace Core;

class Exception
{
    private static $env;

    public static function handle($exception)
    {
        self::$env = config('env', 'production');

        if (self::$env == 'dev') {
            return dd(var_dump($exception->getMessage()));
        }

        return self::handleProduction($exception);
    }

    private static function handleProduction($exception)
    {
        throw new \Exception("Oops. Something went wrong.");
        return;
    }
}
