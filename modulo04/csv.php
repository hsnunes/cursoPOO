<?php

require __DIR__ . '/classes/CSVParser.php';

/**
 * Tratamento para capiturar as exceções lançadas nos metodos
 */
try
{
    $csv = new CSVParser('clientes.csv', ';');
    $csv->parse();

    echo '<pre>';
    // var_dump($csv->fetch());
    // var_dump($csv->fetch());

    // Para uma leitura dinamica das linhas
    while ($row = $csv->fetch())
    {
        // var_dump($row);die;
        print "{$row['Cliente']} - {$row['Cidade']}\n";
    }
}
catch (Exception $e)
{
    print $e->getMessage();
}

