<?php

require __DIR__ . "/classes/Produto.php";
require __DIR__ . "/classes/Caracteristica.php";

$p1 = new Produto('Chocolate', 10, 7);
$p1->addCaracteristica('cor', 'branco');
$p1->addCaracteristica('peso', '500g');


// echo '<pre>';

// print_r($p1);
print "O Produto " . $p1->getDescricao() . '<br >';

$caracteristicas = $p1->getCaracteristica();

// var_dump($caracteristicas);die;

foreach ($caracteristicas as $caracteristica)
{
    $nome = $caracteristica->getNome();
    $valor = $caracteristica->getValor();

    print "{$nome}: {$valor} <br >";
}

// echo '</pre>';