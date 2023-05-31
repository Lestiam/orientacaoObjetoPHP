<?php
//a palavra new é utilizada para criar um objeto, e devolve o endereço dele

//this acessa a instancia

class Conta //é o modelo para criar novos objetos (ou instancias (são sinonimos))
{
    //definir os dados da conta; a variavel possui um endereço que aponta para cá (Objeto Conta)

    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo; // "->" acesso o atributo dessa conta, toda conta vai começar com valor inicial = 0
    private static $numeroDeContas = 0; //é um atributo da forma em si, é um atributo da classe conta em geral, porque se ele não fosse statico, seria um atributo de cada new Conta gerada, e aí, o número de contas sempre seria 1

    public function __construct(string $cpfTitular, string $nomeTitular)
{
    $this->cpfTitular = $cpfTitular;
    $this->validaNomeTitular($nomeTitular); //função para validar se o nome do titular tem pelo menos 5 caracteres dentro do proprio construtor
    $this->nomeTitular = $nomeTitular;
    $this->saldo = 0;

    self::$numeroDeContas++; //a cada conta criada, o numero de contas aumenta; Atraves de o nome da classe mais "::", eu consigo acessar os atributos e métodos estaticos da classe
    //posso chamar "nome da classe atual" atraves da palavra self
}

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
     * @return string
     */
    public function recuperaNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    /**
     * @return float
     */
    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    private function validaNomeTitular(string $nomeTitular) //private pq só a conta precisa ter acesso a esse método
    {
        if (strlen($nomeTitular) < 5) {//strlen conta a quantidade de caracteres
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }

    public static function recuperaNumeroDeContas() : int
    {
        return self::$numeroDeContas; //imprime na tela o numero de contas
    }
}
