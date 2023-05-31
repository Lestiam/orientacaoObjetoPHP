<?php
//a palavra new é utilizada para criar um objeto, e devolve o endereço dele

class Conta //é o modelo para criar novos objetos (ou instancias (são sinonimos))
{
    //definir os dados da conta; a variavel possui um endereço que aponta para cá (Objeto Conta)

    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo = 0; // "->" acesso o atributo dessa conta, toda conta vai começar com valor inicial = 0

    public function saca(float $valorASacar)
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível";
            return; //se eu coloco um return em baixo do if, ele vai mostrar a mensagem do echo e parar a execução. Ou seja, tudo o que vier fora desse if é porque deu certo, já que ele não vai entrar no if
            //isso é chamado de early return, ele deixa o codigo mais legivel e ainda deixa o codigo mais rapido, pois não precisa entrar em cada verificação do if, else if e else
        }

        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "Valor precisa ser positivo";
            return;
        }

        $this->saldo += $valorADepositar;
    }

    //$contaUm->transferir(200, $contaDois);
    public function transfere(float $valorATransferir, Conta $contaDestino): void //digita pubf que o PHP storm já cria uma função publica
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo indisponível";
            return;
        }

        $this->sacar($valorATransferir); //pega o valor da conta atual
        $contaDestino->depositar($valorATransferir); //transfere para outra conta
    }

    /**
     * @return string
     */
    public function recuperaCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    /**
     * @param string $cpfTitular
     */
    public function defineCpfTitular(string $cpfTitular): void
    {
        $this->cpfTitular = $cpfTitular;
    }

    /**
     * @return string
     */
    public function recuperaNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    /**
     * @param string $nome
     */
    public function defineNomeTitular(string $nome): void
    {
        $this->nomeTitular = $nome;
    }

    /**
     * @return float
     */
    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    /**
     * @param float $saldo
     */
    public function defineSaldo(float $saldo): void
    {
        $this->saldo = $saldo;
    }


}
