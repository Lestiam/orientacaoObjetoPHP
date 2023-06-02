<?php


require_once 'C:\Estudo\php\Avançando com Orientação a Objetos com PHP Herança, Polimorfismo e Interfaces\src\Conta.php';
require_once 'C:\Estudo\php\Avançando com Orientação a Objetos com PHP Herança, Polimorfismo e Interfaces\src\Titular.php';
require_once 'C:\Estudo\php\Avançando com Orientação a Objetos com PHP Herança, Polimorfismo e Interfaces\src\Cpf.php';

$cpfIgor = new Cpf('123.456.789-10');
$igor = new Titular($cpfIgor, 'Igor Teles');
$primeiraConta = new Conta($igor);
var_dump($primeiraConta);
$primeiraConta->deposita(500);
$primeiraConta->saca (300);

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;


$cpfPatricia = new Cpf('987.654.321-10');
$patricia = new Titular($cpfPatricia, 'Patricia');
$segundaConta = new Conta($patricia);
var_dump($segundaConta);




$novaConta = new Conta(new Titular(new Cpf('123456789'), 'lolzeiro'));
var_dump($novaConta);

unset($segundaConta);
echo Conta::recuperaNumeroDeContas() . PHP_EOL;
