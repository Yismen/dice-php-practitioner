<?php

namespace Core;

use Core\Redirect;

class Router
{
    private static $routes = [
        'GET' => [],
        'POST' => []
    ];

    private static $instance;

    public function __construct()
    {
        // self::$instance = new self;
    }

    public static function load($file)
    {
        $router = new self;

        require $file;

        return $router;
    }

    public static function get($uri, $controller)
    {
        $instance = new self;
        
        self::$routes['GET'][$uri] = $controller;

        return $instance;
    }

    public static function post($uri, $controller)
    {
        $instance = new self;
        
        self::$routes['POST'][$uri] = $controller;

        return $instance;
    }

    public static function direct($uri, $method)
    {
        if (array_key_exists($uri, self::$routes[$method])) {
            $action = explode('@', self::$routes[$method][$uri]);

            return self::callAction($action[0], $action[1]);
        }
        throw new \Exception("Route {$method} - {$uri} is not defined.");
        
        // Exception::handle(new \Exception("Route {$method} - {$uri} is not defined."));
    }

    private static function callAction($controller, $method)
    {
        $controller = "App\Http\Controllers\\{$controller}";

        $controller = new $controller;

        if (method_exists($controller, $method)) {
            return $controller->$method();
        }
        
        throw new \Exception("Method {$method} is not defined in Controller ".get_class($controller));
    }
}
