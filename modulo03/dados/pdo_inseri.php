<?php

// Linha com erro de sintaxe;
// $conn = new PDO('mysql:dbname=cursopoo;user=root;password=root;host=localhost');

try
{
    $conn = new PDO('mysql:host=127.0.0.1;port=3306;dbname=cursopoo', 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec('INSERT INTO famosos (id, nome) VALUES (1, "Lisa Ann") ');
    $conn->exec('INSERT INTO famosos (id, nome) VALUES (2, "Holy Hendrix") ');
    $conn->exec('INSERT INTO famosos (id, nome) VALUES (3, "Bruna Butterfly") ');
    $conn->exec('INSERT INTO famosos (id, nome) VALUES (4, "Rachel Star") ');
    $conn->exec('INSERT INTO famosos (id, nome) VALUES (5, "Jada Fire") ');
    $conn->exec('INSERT INTO famosos (id, nome) VALUES (6, "Richele Rian") ');
    $conn->exec('INSERT INTO famosos (id, nome) VALUES (7, "Ed Junior") ');

    $conn = null;

} catch (PDOException $e)
{
    print $e->getMessage();
}


// print '<pre>';
// print_r($conn);