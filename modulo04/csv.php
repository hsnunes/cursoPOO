<?php

require __DIR__ . '/classes/CSVParser.php';

$csv = new CSVParser('clientes.csv', ';');
$csv->parse();

echo '<pre>';
// var_dump($csv->fetch());
// var_dump($csv->fetch());

// Para uma leitura dinamica das linhas
while ($row = $csv->fetch())
{
    var_dump($row);
}