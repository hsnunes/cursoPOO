<?php

$dados = $_POST;

$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');

$result = mysqli_query($conn, "SELECT max(id) as next FROM pessoa");
$row = mysqli_fetch_assoc($result);

$next = ($row['next'] + 1);

$sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
        VALUES ('{$next}', '{$dados['nome']}', '{$dados['endereco']}',
                '{$dados['bairro']}', '{$dados['telefone']}', '{$dados['email']}',
                '{$dados['id_cidade']}') ";


// print $sql;
$result = mysqli_query($conn, $sql);
if ($result)
{
    print "Cadastro com Sucesso!";
}
else
{
    print "Não Conseguimos gravar seus dados.";
}
$conn = null;


// mysqli_query($conn, "");