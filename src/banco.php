<?php
//f -> field (atributo) m -> metod (metodo)

require_once 'C:\Estudo\php\orientacaoObjetoPHP\src\Conta.php';

$primeiraConta = new Conta('123.456.789-10', 'Igor Teles');
var_dump($primeiraConta);
$primeiraConta->deposita(500);
$primeiraConta->saca (300); //isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

$segundaConta = new Conta('987.654.321.-10', 'Patricia');
var_dump($segundaConta);

$novaConta = new Conta('132456495123', 'haduhsaudunasu');

unset($segundaConta); //destroi essa variavel / objeto
echo Conta::recuperaNumeroDeContas() . PHP_EOL;
