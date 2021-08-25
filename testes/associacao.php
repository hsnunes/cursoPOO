<?php

if (file_exists(__DIR__ . '/classes/Fabricante.php'))
{
    require __DIR__ . '/classes/Fabricante.php';
    require_once __DIR__ . '/classes/Produto.php';
}

$p1 = new Produto('clocolate', 10, 7);
$f1 = new Fabricante('Fabrica', 'Rua endereco', '333.333.333-33');

echo '<pre>';
var_dump($p1, $f1);
echo '</pre>';