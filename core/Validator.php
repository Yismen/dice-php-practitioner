<?php

namespace Core;

class Validator
{
    protected $pass;
    protected $fails = true;
    protected $errors = [];

    public function make($request, $rules)
    {
        foreach ($rules as $field => $rules) {
            $rules = explode('|',
                trim($rules, ' ')
            );

            if (! array_key_exists($field, $request)) {
                throw new \Exception("Request does not contains {$field}");                
            }
            
            foreach ($rules as $rule) {
                $rule = explode(':', $rule);

                if (count($rule) > 1) {
                    $this->argument = $rule[1];
                }
                
                $method = $rule[0];

                $this->$method($field, $request[$field]);
            }
        }
    }

    public function pass()
    {
        return $this->pass;
    }

    public function fails()
    {
        return $this->fails;
    }

    public function error($key)
    {
        return $this->errors[$key];
    }

    public function errors()
    {
        return $this->errors;
    }

    public function assert($assertion, $error)
    {
        $this->pass = $assertion;
        $this->fails = ! $assertion;

        if ($this->fails()) {
            $this->errors[] = $error;
        }
    }

    public function required($field, $value)
    {
        return $this->assert(
            strlen($value) > 0, [
                $field => "field {$field} is required."
            ]
        );
    }

    public function min($field, $value)
    {
        return $this->assert(strlen($value) >= $this->argument, [
            $field => "field {$field} should be of a minimum length of {$this->argument} characters."
        ]);
    }

    public function max($field, $value)
    {
        return $this->assert(strlen($value) <= $this->argument, [
            $field => "field {$field} should be of a max length of {$this->argument} characters."
        ]);
    }

    public function length($field, $value)
    {
        return $this->assert(
            strlen($value) == $this->argument, 
            [
                $field => "field {$field} should be of a exact length of {$this->argument} characters."
            ]
        );
    }
}