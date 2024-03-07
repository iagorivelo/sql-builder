<?php

namespace app\Select;

class Select
{
  protected $table   = null;
  protected $columns = null;
  protected $where   = null;

  public function __construct($table = null)
  {
    if ($table)
    {
      $this->from($table);
    }
  }

  public function from($table)
  {
    $this->table = $table;
  }

  public function columns($columns): Select
  {
    $this->columns = $columns;

    return $this;
  }

  public function where($where): Select
  {
    $arrayWhere = (array) $where;
    
    $this->where = implode(', ', $arrayWhere['where']);

    return $this;
  }

  public function buildSqlString()
  {
    if ($this->columns)
    {
      $cols = [];

      foreach($this->columns as $key => $value)
      {
        if(gettype($key) == 'string')
        {
          $cols[] = $value . ' AS ' . $key;
        }
        elseif(gettype($key) == 'integer')
        {
          $cols[] = $value;
        }
      }

      $sqlString = "SELECT " . implode(', ', $cols) . " FROM {$this->table}";
    }
    else
    {
      $sqlString = "SELECT * FROM {$this->table}";
    }

    if ($this->where)
    {
      $sqlString .= " WHERE {$this->where}";
    }

    return $sqlString;
  }
}