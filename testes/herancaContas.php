<?php

require __DIR__ . "/classes/Conta.php";
require __DIR__ . "/classes/ContaPoupanca.php";
require __DIR__ . "/classes/ContaCorrente.php";

$cp1 = new ContaPoupanca('01', '123456', 2000);

echo '<pre>';

var_dump($cp1);

echo '</pre>';