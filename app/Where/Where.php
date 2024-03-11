<?php

namespace app\Where;

class Where
{
  protected $conditions = [];

  public function equalTo($column, $value)
  {
    $this->conditions[] = "$column = '$value'";
  }

  public function notEqualTo($column, $value)
  {
    $this->conditions[] = "$column != '$value'";
  }

  public function in($column, array $values)
  {
    $valuesStr = implode("', '", $values);

    $this->conditions[] = "$column IN ('$valuesStr')";
  }

  public function notIn($column, array $values)
  {
    $valuesStr = implode("', '", $values);

    $this->conditions[] = "$column NOT IN ('$valuesStr')";
  }

  public function getConditions()
  {
    return implode(' AND ', $this->conditions);
  }
}