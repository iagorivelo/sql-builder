<?php

namespace app\Sql;

use app\Select\Select;

class Sql
{
  protected $table = null;

  public function __construct() {}

  public function select($table = null)
  {
    return new Select(($table) ?? '');
  }
}