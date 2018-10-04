<?php

namespace Core;

use Core\App;
use Core\Database\Query\Builder;

class Model
{
    // implements Queries;

    protected $primary = 'id';
	protected static $instance;
    protected static $table;

    protected static $connection;

    /* public function __construct()
    {
        $this->connection = new Builder(
            App::resolve('pdo'),
            $this->table
        );
    } */
	
	public static function getInstance()
	{
		static::$instance =  static::$instance ? static::$instance : new static;
		
		static::$connection = new Builder(
            App::resolve('pdo'),
            static::$table
        );
	}
	
	public static function getAll()
	{
		static::getInstance();
		
		return static::$connection->get();
	}

    public static function create(array $request)
    {
		static::getInstance();
		
		return static::$connection->insert($request);
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
