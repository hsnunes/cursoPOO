<?php

if (file_exists(__DIR__ . '/classes/Fabricante.php'))
{
    require __DIR__ . '/classes/Fabricante.php';
    require_once __DIR__ . '/classes/Produto.php';
}

$p1 = new Produto('clocolate', 10, 7);
$f1 = new Fabricante('Fabrica', 'Rua endereco', '333.333.333-33');

// Destacando a Associação entre as classes Produto e Fabricante
$p1->setFabricante( $f1 );

// Mostrando o fabricante em tela
print "O Fabricante do produto {$p1->getDescricao()} é {$p1->getFabricante()->getNome()}";
echo "<br >";

echo '<pre>';
var_dump($p1, $f1);
echo '</pre>';