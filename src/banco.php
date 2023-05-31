<?php
//f -> field (atributo) m -> metod (metodo)

require_once 'C:\Estudo\php\orientacaoObjetoPHP\src\Conta.php';

$primeiraConta = new Conta();
$primeiraConta->deposita(500);
$primeiraConta->saca (300); //isso é ok
$primeiraConta->defineCpfTitular('123.456.789-10');

echo $primeiraConta->recuperaSaldo();
echo $primeiraConta->recuperaCpfTitular();

