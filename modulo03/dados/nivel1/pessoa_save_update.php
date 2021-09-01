<?php

$dados = $_POST;

// var_dump($dados);die();

if ($dados['id'])
{

    $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');
    $sql = "UPDATE pessoa SET nome = '{$dados['nome']}',
                              endereco = '{$dados['endereco']}',
                              bairro = '{$dados['bairro']}',
                              telefone = '{$dados['telefone']}',
                              email = '{$dados['email']}',
                              id_cidade = '{$dados['id_cidade']}'
                              WHERE id = '{$dados['id']}'";

    $result = mysqli_query($conn, $sql);
    if ($result)
    {
        print "Registro Atualizado com Sucesso!";
    }
    else 
    {
        print "Não foi possivel atualizar os Dados";
    }
    $conn = null;


}

