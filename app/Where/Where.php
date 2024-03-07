<?php

namespace app\Where;

class Where
{
  public $where = [];

  public function equalTo($column, $columnValue): Where
  {
    $this->where[] = "{$column} = '{$columnValue}'";

    return $this;
  }
}