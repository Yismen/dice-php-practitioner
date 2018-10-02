<?php

namespace Core\Database\Query;

class Builder
{
    private $pdo;
    private $table;

    private $select = 'select *';
    private $statement;
    private $where;

    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function insert(array $fields)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $this->table,
            implode(', ', array_keys($fields)),
            ':'.implode(', :', array_keys($fields))
        );

        $this->statement = $this->pdo->prepare($sql);

        $this->statement->execute($fields);
    }

    public function select($columns = "*")
    {
        $this->select = 'select ';
        if (is_array($columns)) {
            foreach ($columns as $key => $value) {
                $this->select .= $value.', ';
            }
        } else {
            $this->select .= $columns;
        }

        $this->select = $this->parseString($this->select);

        return $this;
    }

    public function where($column, $operator, $value)
    {
        $this->where = 'where ';
        $this->where .= $column.$operator.$value;
        // $this->select = $this->parseString($this->select);

        return $this;
    }

    public function get()
    {
        $this->statement = $this->pdo->prepare("{$this->select} from {$this->table} {$this->where}");

        $this->statement->execute();

        return $this->statement->fetchAll(\PDO::FETCH_CLASS);
    }

    private function parseString($string)
    {
        $string = trim($string, ' ');
        $string = trim($string, ',');
        return $string;
    }

    public function raw($query)
    {
        $this->statement = $this->pdo->prepare($query);

        $this->statement->execute();

        return $this->statement->fetchAll(\PDO::FETCH_CLASS);
    }
}
