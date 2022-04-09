<?php

class Conta
{
    private string $cpfTitular;
    private string $nomeTitular;
    private float $saldo;

    private static $numeroDeContas = 0;

    public function __construct(string $cpfTitular, string $nomeTitular)
    {
        $this->cpfTitular = $cpfTitular;
        $this->validaCpf($this->cpfTitular);
        $this->nomeTitular = $nomeTitular;
        $this->validaNomeTitular($this->nomeTitular);
        $this->saldo = 0;

        Conta::$numeroDeContas++;
    }

    public function saca(float $valorASacar) : void
    {
        if($valorASacar < 0) {
            echo "Saque indevido";
            return; // Early Return
        }
        
        if($valorASacar > $this->saldo) {
            echo "Saldo indisponivel";
            return; // Early Return
        }

        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar) : void
    {
        if($valorADepositar < 0) {
            echo "Deposito invalido";
            return; // Early Return
        }

        $this->saldo += $valorADepositar;
    }

    public function transfere(float $valorATransferir, Conta $conta)
    {
        if($this->saldo < $valorATransferir){
            echo "Saldo insuficiente para transferir";
            return; // Early Return
        }

        $this->sacar($valorATransferir);
        $conta->depositar($valorATransferir);
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaCpfTitular(): string
    {
        return $this->cpfTitular;
    }

    public function defineCpfTitular(string $cpf): void
    {
        $this->cpfTitular = $cpf;
    }

    public function recuperaNomeTitular(): string
    {
        return $this->nomeTitular;
    }

    public function defineNomeTitular(string $nome): void
    {
        $this->nomeTitular = $nome;
    }

    private function validaCpf(string $cpf): void
    {
        if(strlen($cpf) != 14) {
            echo "cpf precisa conter 14 digitos" . PHP_EOL;
            exit();
        }
    }

    private function validaNomeTitular(string $nome): void
    {
        if(strlen($nome) < 4) {
            echo "Nome do titular da conta deve possuir pelo menos 4 caracteres" . PHP_EOL;
            exit();
        }
    }

    public static function recuperarNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }
    
    public function __destruct()
    {
        self::$numeroDeContas--;
    }
}