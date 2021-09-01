<?php

$id = $_GET['id'];

if ($id)
{
    $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');

    $id = (int) $id;
    $sql = "DELETE FROM pessoa WHERE id = {$id}";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        print "Registro Excluido!";
    }
    else {
        print "Não foi possivel excluir o registro!";
    }
    $conn = null;

}