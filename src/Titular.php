<?php

class Titular
{
    private Cpf $cpf;
    private string $nome;

    public function __construct(Cpf $cpf, string $nome) //digito __ e a IDE já me auxilia nos métodos
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    public function recuperaCpf(): string
    {
        return $this->cpf->recuperaNumero();
    }

    public function recuperaNome(): string
    {
        return $this->nome;
    }

    private function validaNomeTitular(string $nomeTitular) //private pq só a conta precisa ter acesso a esse método
    {
        if (strlen($nomeTitular) < 5) {//strlen conta a quantidade de caracteres
            echo "Nome precisa ter pelo menos 5 caracteres";
            exit();
        }
    }
}