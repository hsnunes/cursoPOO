<?php

require __DIR__ . "/classes/Produto.php";
require __DIR__ . "/classes/Cesta.php";
require __DIR__ . "/classes/Fabricante.php";
require __DIR__ . "/classes/Caracteristica.php";

$p1 = new Produto("Chocolate", 10, 7);
$p2 = new Produto("cafe", 5, 4);
$p3 = new Produto("suco", 8, 6);

$f1 = new Fabricante("HSN", 'BonJardim, 321', '12345678');
$f2 = new Fabricante("BRU", 'Marex, 154', '84598715');
$f3 = new Fabricante("ELO", 'Brevea', '987125432');

$p1->addCaracteristica('cor', 'branco');
$p1->addCaracteristica('peso','100g');
$p1->setFabricante($f1);

$p2->addCaracteristica('tipo','forte');
$p2->addCaracteristica('peso','500g');
$p2->setFabricante($f2);

$p3->addCaracteristica('sabor','laranja');
$p3->addCaracteristica('peso','1L');
$p1->setFabricante($f3);

$c1 = new Cesta();
$c1->addItem($p1);
$c1->addItem($p2);
$c1->addItem($p3);

print "Nesta cesta teremos os seguintes produtos: <br >";

$itens = $c1->getItem();

// print '<pre>';
// print_r($c1);
// print '</pre>';

foreach ($itens as $item)
{
    print "Item: {$item->getDescricao()} / Fabricante: {$item->getFabricante()->getNome()}<br >";
    foreach ($item->getCaracteristica() as $caracteristica)
    {
        print "-- {$caracteristica->getNome()}: {$caracteristica->getValor()}  <br >";
    }
    print "<br >";
}

