<?php
use Core\App;
use Core\Router;
use Core\Request;
use Core\Database\Connection;
use Core\Database\Query\Builder;

require 'vendor/autoload.php';
require 'core/bootstraps/helpers.php';

App::bind('connection', config('db_connection'));
App::bind('pdo', Connection::make(App::resolve('connection')));

Router::load('app/http/routes.php')
    ->direct(Request::uri(), Request::method());