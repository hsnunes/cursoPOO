<?php

require __DIR__ . "/classes/Conta.php";
require __DIR__ . "/classes/ContaPoupanca.php";
require __DIR__ . "/classes/ContaCorrente.php";

$cp1 = new ContaPoupanca('01', '123456', 2000);
print $cp1->getSaldo() . '<br >';

$cp1->depositar(832);
print $cp1->getSaldo() . '<br >';

$cp1->retirar(200);
print $cp1->getSaldo() . '<br >';

// echo '<pre>';

// var_dump($cp1);

// echo '</pre>';