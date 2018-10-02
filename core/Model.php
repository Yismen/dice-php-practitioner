<?php

namespace Core;

use Core\App;
use Core\Database\Query\Builder;

class Model
{
    // implements Queries;

    protected $primary = 'id';
    protected $table;

    protected $connection;

    public function __construct()
    {
        $this->connection = new Builder(
            App::resolve('pdo'),
            $this->table
        );
    }

    public function create(array $request)
    {
        $this->connection->insert($request);
    }

    public function getAll()
    {
        return $this->connection->get();
    }

    public function find($id)
    {
        return $this->connection->where($this->primary, '=', $id)->get()[0];
    }

    public function select($select = '*')
    {
        $this->connection->select($select);

        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->connection->where($column, $operator, $value);

        return $this;
    }

    public function get()
    {
        return $this->connection->get();
    }

    public function raw($query)
    {
        return $this->connection->raw($query);
    }
}
