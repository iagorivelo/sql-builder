<?php

namespace app\Where;

class Where
{
  public $where = [];

  public function equalTo(string $column, string $columnValue): Where
  {
    $this->where[] = "{$column} = '{$columnValue}'";

    return $this;
  }

  public function notEqualTo(string $column, string $columnValue): Where
  {
    $this->where[] = "{$column} != '{$columnValue}'";

    return $this;
  }

  public function in(string $column, array $columnValue): Where
  {
    $formatArray = implode(', ', $columnValue);

    $this->where[] = "{$column} IN ('{$formatArray}')";

    return $this;
  }

  public function notIn(string $column, array $columnValue): Where
  {
    $formatArray = implode(', ', $columnValue);
    
    $this->where[] = "{$column} NOT IN ('{$formatArray}')";

    return $this;
  }
}