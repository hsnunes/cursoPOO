<?php

use Conta;

class ContaPoupanca extends Conta
{

    public function retirar($quantia)
    {
        if ($quantia >= $this->getSaldo()) {
            $this->saldo -= $quantia;
        }
    }
}
