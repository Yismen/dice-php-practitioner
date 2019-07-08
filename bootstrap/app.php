<?php

use Core\App;
use Core\Router;
use Core\Request;
use Core\Database\Connection;

require 'vendor/autoload.php';
require 'core/helpers/helpers.php';

App::bind('connection', config('db_connection'));
App::bind('pdo', Connection::make(App::resolve('connection')));

Router::load('routes/web.php')
    ->direct(Request::uri(), Request::method());
