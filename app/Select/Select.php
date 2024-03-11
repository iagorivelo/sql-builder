<?php

namespace app\Select;

use app\Where\Where;

class Select
{
  protected $from;
  protected $columns = [];
  protected $where;

  public function __construct($table = null)
  {
    if(isset($table) && !empty($table))
    {
      $this->from = $table;
    }
  }

  public function from($table)
  {
    $this->from = $table;

    return $this;
  }

  public function columns(array $columns)
  {
    $this->columns = $columns;

    return $this;
  }

  public function where(Where $where)
  {
    $this->where = $where;

    return $this;
  }

  public function getFrom()
  {
    return $this->from;
  }

  public function getColumns()
  {
    return $this->columns;
  }

  public function getWhere()
  {
    return $this->where;
  }
}