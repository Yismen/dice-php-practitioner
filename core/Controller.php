<?php

namespace Core;

use Core\Validator;

class Controller
{
    public $validator;

    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function validate($request, $rules)
    {
        $this->validator = new Validator;

        $this->validator->make($request, $rules);
    }
}
