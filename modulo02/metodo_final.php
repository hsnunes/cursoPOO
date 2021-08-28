<?php

require __DIR__ . "/classes/Conta.php";
require __DIR__ . "/classes/ContaCorrente.php";

class ContaCorrenteEspecial extends ContaCorrente
{
    public function retirar($quantia)
    {
        $this->saldo -= $quantia;
    }
}
