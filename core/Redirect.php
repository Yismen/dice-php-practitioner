<?php

namespace Core;

class Redirect
{
	private static $instance;
	
	public static $response = [
		'data' => [],
		'errors' => []
	];
	
	private static function getInstance()
	{
		static::$instance = static::$instance ?: new static;
	}
	
    public static function to($path = '/')
    {
        static::getInstance();

        header('Location: '.$path);

        return static::$instance;
    }
	
/**
*
*/
    public static function with($array)
    {
        static::getInstance();
		
		static::$response['data'] = $array;
		
		if(array_key_exists('errors', $array)) {
			static::$response['errors'] = $array['errors'];
		}

        return static::$instance;
    }
}
