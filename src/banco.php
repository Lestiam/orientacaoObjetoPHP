<?php
//f -> field (atributo) m -> metod (metodo)

require_once 'C:\Estudo\php\orientacaoObjetoPHP\src\Conta.php';
require_once 'C:\Estudo\php\orientacaoObjetoPHP\src\Titular.php';
require_once 'C:\Estudo\php\orientacaoObjetoPHP\src\Cpf.php';

$cpfIgor = new Cpf('123.456.789-10');
$igor = new Titular($cpfIgor, 'Igor Teles');
$primeiraConta = new Conta($igor);
var_dump($primeiraConta);
$primeiraConta->deposita(500);
$primeiraConta->saca (300); //isso é ok

echo $primeiraConta->recuperaNomeTitular() . PHP_EOL;
echo $primeiraConta->recuperaCpfTitular() . PHP_EOL;
echo $primeiraConta->recuperaSaldo() . PHP_EOL;

//a conta precisa de um titular, mas o que um tiitular precisa é outra historia
$cpfPatricia = new Cpf('987.654.321-10');
$patricia = new Titular($cpfPatricia, 'Patricia');
$segundaConta = new Conta($patricia);
var_dump($segundaConta);

//$novoCpf = new Cpf('123456789');
//$novoNome = new Titular($novoCpf,'lolzeiro');
//$novaConta = new Conta($novoNome);

//a mesma coisa acim só que em uma unica linha
$novaConta = new Conta(new Titular(new Cpf('123456789'), 'lolzeiro'));
var_dump($novaConta);

unset($segundaConta); //destroi essa variavel / objeto
echo Conta::recuperaNumeroDeContas() . PHP_EOL;
