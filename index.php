<?php

require_once "vendor/autoload.php";

use app\Sql\Sql;
use app\Where\Where;

$sql   = new Sql();
$where = new Where();

$where->equalTo('cpfcnpj', '99999999999');
$where->equalTo('nome', 'Teste');

$select = $sql->select('alooooha')->columns([
  'teste' => 'Aloha',
  'cfpcnpj'
])->where($where);

var_dump($select->buildSqlString());

/* Retorno tem que ser parecido com essa consulta -> SELECT Aloha AS teste, cfpcnpj FROM alooooha WHERE cpfcnpj = '99999999999', nome = 'Teste' */