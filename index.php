<?php

require_once "vendor/autoload.php";

use app\Sql\Sql;
use app\Where\Where;

$sql   = new Sql();
$where = new Where();

$where->equalTo('id', 1);

$select = $sql->select('teste_tb')->columns([
  'nome'
])->where($where);

$rs = $sql->prepareSql($select)->execute();

/* Retorno tem que ser parecido com essa consulta -> SELECT Aloha AS teste, cfpcnpj FROM alooooha WHERE cpfcnpj = '99999999999', nome = 'Teste' */