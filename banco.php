<?php

require_once 'src/Conta.php';

/* 

$primeira_conta = new Conta();
$primeira_conta->deposita(500);
$primeira_conta->saca(300);
//$primeira_conta->saldo -= 300; erro
var_dump($primeira_conta);

echo $primeira_conta->recuperaSaldo() . PHP_EOL;

$primeira_conta->defineNomeTitular('Fulano da Silva');
$primeira_conta->defineCpfTitular('123.123.123-32');

echo "Dados da conta:" . PHP_EOL;
echo "Titular: {$primeira_conta->recuperaNomeTitular()}" . PHP_EOL;
echo "CPF: {$primeira_conta->recuperaCpfTitular()}" . PHP_EOL;
echo "Saldo: {$primeira_conta->recuperaSaldo()}" . PHP_EOL;
echo "----------------------------------------------------" . PHP_EOL;

 */

$segunda_conta = new Conta('987.987.987-99', 'Beltrano Pereira');
var_dump($segunda_conta);

$terceira_conta = new Conta('987.987.987-99', 'Belll');
var_dump($terceira_conta);

$quarta_conta = new Conta('123.123.123-22', 'Ciclano');

echo "Numero total de contas abertas: ";
echo Conta::recuperarNumeroDeContas();
echo " " . PHP_EOL;

unset($segunda_conta);

echo "Numero total de contas abertas: ";
echo Conta::recuperarNumeroDeContas();
echo " " . PHP_EOL;
