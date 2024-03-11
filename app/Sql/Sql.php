<?php

namespace app\Sql;

use app\Select\Select;
use PDO;
use PDOException;

class Sql
{
  protected $select;
  protected $query;

  public function select($table = null)
  {
    $this->select = new Select($table);

    return $this->select;
  }

  public function prepareSql(Select $select)
  {
    $query = "SELECT ";

    if($select->getColumns())
    {
      $query .= implode(', ', $select->getColumns());
    }
    else
    {
      $query .= '*';
    }

    $query .= " FROM {$select->getFrom()}";

    if($select->getWhere())
    {
      $query .= " WHERE {$select->getWhere()->getConditions()}";
    }

    $this->query = $query;

    return $this;
  }

  public function execute()
  {
    $server   = 'localhost';
    $user     = 'user';
    $password = 'password';
    $database = 'db';

    try
    {
      $conn = new PDO("mysql:host=$server;dbname=$database", $user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      $stmt = $conn->prepare($this->query);
      $stmt->execute();
      
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return count($result) > 0 ? $result : [];
    }
    catch(PDOException $e)
    {
      echo "Erro de conexão: " . $e->getMessage();
    }
  }
}