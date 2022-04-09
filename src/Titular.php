<?php

class Titular
{
    private CPF $cpf;
    private string $nome;

    public function __construct(CPF $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validaNomeTitular($nome);
        $this->nome = $nome;
    }

    private function validaNomeTitular(string $nome): void
    {
        if(strlen($nome) < 4){
            echo "O nome do titular precisa ter mais que 3 caracteres." . PHP_EOL;
            exit(); // Tratativa de erro em estagio inicial. Existem tecnicas mais recomendadas.
        }
    }

    // metodo Get
    private function recuperaCpf(): string
    {
        return $this->cpf->recuperaNumero();
    }

    private function recuperaNomeDoTitular(): string
    {
        return $this->nome;
    }
}