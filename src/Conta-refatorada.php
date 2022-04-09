<?php

class Conta
{
    private Titular $titular;
    private float $saldo;

    private static $numeroDeContas = 0;

    public function __construct(Titular $titularDaConta)
    {
        $this->titular = $titularDaConta;
        $this->saldo = 0;

        Conta::$numeroDeContas++;
    }

    public function saca(float $valorASacar): void
    {
        if($valorASacar < 0) {
            echo "Saque indevido" . PHP_EOL;
            return; // Tecnica Early Return
        }

        if($valorASacar > $this->saldo) {
            echo "Saldo indisponivel" . PHP_EOL;
            return;
        }

        //tudo ok
        $this->saldo -= $valorASacar;
    }

    public function deposita(float $valorADepositar): void
    {
        if($valorADepositar < 0) {
            echo "Deposito invalido" . PHP_EOL;
            return;
        }

        $this->saldo += $valorADepositar;
    }

    public function transfere(float $valorATransferir, Conta $conta): void
    {
        if($this->saldo < $valorATransferir){
            echo "Saldo insuficiente para realizar transferencia." . PHP_EOL;
            return;
        }

        // Note que nao eh necessario revalidar aqui, pois isso ja ocorre nos respectivos metodos abaixo
        $this->saca($valorATransferir);
        $conta-deposita($valorATransferir);
    }

    public function recuperaSaldo(): float
    {
        return $this->saldo;
    }

    public function recuperaCpfTitular(): string
    {
        return $this->titular->recuperaCpf();
    }

    public function recuperaNomeTitular(): string
    {
        return $this->titular->recuperaNomeDoTitular();
    }

    public function recuperaNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }

    public function __destruct()
    {
        self::$numeroDeContas--;
    }
}