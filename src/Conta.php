<?php
//a palavra new é utilizada para criar um objeto, e devolve o endereço dele

class Conta //é o modelo para criar novos objetos (ou instancias (são sinonimos))
{
    //definir os dados da conta; a variavel possui um endereço que aponta para cá (Objeto Conta)

    public string $cpfTitular;
    public string $nomeTitular;
    public float $saldo = 0; // "->" acesso o atributo dessa conta, toda conta vai começar com valor inicial = 0

    public function sacar(float $valorASacar)
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return; //se eu coloco um return em baixo do if, ele vai mostrar a mensagem do echo e parar a execução. Ou seja, tudo o que vier fora desse if é porque deu certo, já que ele não vai entrar no if
        }

        $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    //$contaUm->transferir(200, $contaDois);
    public function transferir(float $valorATransferir, Conta $contaDestino): void //digita pubf que o PHP storm já cria uma função publica
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->sacar($valorATransferir); //pega o valor da conta atual
        $contaDestino->depositar($valorATransferir); //transfere para outra conta
    }
}
