<?php

require_once 'src/Conta-refatorada.php';
require_once 'src/Cpf.php';
require_once 'src/Titular.php';

$conta1 = new Conta(new Titular(new CPF('123.132.123-12'), "Sintica Setups"));

var_dump($conta1);

$conta1->deposita(500);

$cpf2 = new CPF('111.111.111-22');
$titular2 = new Titular($cpf2, "Elena Cunha");
$conta2 = new Conta($titular2);

echo "Numero total de contas abertas: ";
echo Conta::recuperaNumeroDeContas();
echo " " . PHP_EOL;

unset($conta2);

echo "Numero total de contas abertas: ";
echo Conta::recuperaNumeroDeContas();
echo " " . PHP_EOL;