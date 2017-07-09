<?php

use Core\Router;

Router::get('', 'PagesController@home');
Router::get('home', 'PagesController@home');
Router::get('about', 'PagesController@about');
Router::get('clients', 'ClientsController@index');
Router::post('clients', 'ClientsController@store');
Router::get('about/culture', 'PagesController@culture');