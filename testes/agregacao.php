<?php

require __DIR__ . "/classes/Produto.php";
require __DIR__ . "/classes/Cesta.php";

$p1 = new Produto("Chocolate", 10, 7);
$p2 = new Produto("cafe", 5, 4);
$p3 = new Produto("suco", 8, 6);


$c1 = new Cesta();
$c1->addItem($p1);
$c1->addItem($p2);
$c1->addItem($p3);

print '<pre>';

print_r($c1);

print '</pre>';
