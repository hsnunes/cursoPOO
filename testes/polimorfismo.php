<?php

require __DIR__ . "/classes/Conta.php";
require __DIR__ . "/classes/ContaCorrente.php";
require __DIR__ . "/classes/ContaPoupanca.php";


$contas = [];

$contas[] = new ContaCorrente(1245, 'CC.1245', 100, 500);
$contas[] = new ContaPoupanca(145, 'CP.145', 100);

foreach ($contas as $conta)
{
    // Percorre todos as contas que herdam da classe Conta
    if ($conta instanceof Conta)
    {
        print $conta->getInfo()."<br >";
    }
}
