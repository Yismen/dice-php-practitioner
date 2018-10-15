<?php

namespace App\Http\Controllers;

use Core\Request;
use Core\Redirect;
use Core\Controller;
use App\Http\Models\Empleado;

class EmpleadosController extends Controller
{

    public function index()
    {
        $empleados = Empleado::getAll();

        return view('empleados.index', compact('empleados'));
    }

    public function store()
    {
        $this->validate(Request::all(), [
            'name' => 'required|min:5'
        ]);

        if ($this->validator->fails()) {
            return Redirect::with(['errors' => $this->validator->errors()])
                ->to('clients');
        }

        $client = Client::create([
            'name' => Request::get('name'),
            'slug' => str_slug(Request::get('name')),
        ]);

        redirect('clients');
    }
}
