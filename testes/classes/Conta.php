<?php

class Conta
{
    protected $agencia;
    protected $conta;
    protected $saldo;

    public function __construct($ag, $conta, $saldo)
    {
        $this->agencia = $ag;
        $this->conta = $conta;
        $this->saldo = $saldo;
    }

    public function depositar($quantia)
    {
        if ($quantia > 0) {
            $this->saldo += $quantia;
        }
    }

    public function getSaldo()
    {
        return $this->saldo;
    }
}