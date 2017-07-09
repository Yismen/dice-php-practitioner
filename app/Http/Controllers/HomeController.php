<?php

namespace App\Http\Controllers;

use Core\App;
use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $users = ['one', 'two'];
        
        $query = new Builder(App::resolve('pod'));
        dd($query->fetchAll('genders'));

        return view('tasks.index', compact('users'));
    }
}