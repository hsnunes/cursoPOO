<?php

require __DIR__ . "/classes/OrcavelInterface.php";
require __DIR__ . "/classes/Orcamento.php";
require __DIR__ . "/classes/ProdutoOrcavel.php";
require __DIR__ . "/classes/Servico.php";

$orc = new Orcamento;
$orc->adiciona( new ProdutoOrcavel('Máquina de café', 10, 299), 1 );
$orc->adiciona( new ProdutoOrcavel('Barbeador Eletrico', 10, 299), 1 );
$orc->adiciona( new ProdutoOrcavel('Máquina de pipoca', 12, 277), 3 );
$orc->adiciona( new Servico('Conserto', 23), 1 );
$orc->adiciona( new Servico('Manutencao', 30), 2 );


echo '<pre>';
var_dump($orc);die;

print $orc->calculaTotal();