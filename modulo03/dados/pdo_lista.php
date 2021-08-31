<?php

try
{
    $conn = new PDO('mysql:host=localhost;port=3306;dbname=cursopoo', 'root', 'root');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $conn->query('SELECT * FROM famosos');

    // foreach ($result as $row)
    // retornando um ojeto
    while ( $row = $result->fetch(PDO::FETCH_OBJ) )
    {
        // var_dump($row);die;
        // print "{$row['id']} - {$row['nome']} <br >";
        // Agora o row é usado como objeto
        print "{$row->id} - {$row->nome} <br >";
    }

    // if ($result)
    // {
    //     # code...
    // }

} catch (PDOException $e)
{
    print $e->getMessage();
}

// print '<pre>';
// var_dump($result);