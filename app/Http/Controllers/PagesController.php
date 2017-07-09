<?php

namespace App\Http\Controllers;

use Core\Request;
use Core\Controller;
use App\Http\Models\Client;

class PagesController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client;
    }

    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {

        return view('pages.about');
    }

    public function culture()
    {
        return view('pages.culture');
    }
}