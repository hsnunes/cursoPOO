<?php

use Conta;

class ContaPoupanca extends Conta
{

    public function retirar($quantia)
    {
        if ($quantia >= $this->saldo) {
            $this->saldo -= $quantia;
        }
    }
}
