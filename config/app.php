<?php

return [
    'env' => env('ENV', 'production'), // dev, production
    
    'db_connection' => [
        'dbhost' => env('DB_HOST', 'localhost'),
        'dbname' => env('DB_NAME', 'test'),
        'username' => env('DB_USER', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'options' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    ]
];
