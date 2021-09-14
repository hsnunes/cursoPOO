<?php

function get_pessoa($id)
{
    $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');
    $result = mysqli_query($conn, "SELECT * FROM pessoa WHERE id = {$id}");
    $pessoas = mysqli_fetch_assoc($result);
    $conn = null;
    return $pessoas;
}

function exclui_pessoa($id)
{
    $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');
    $result = mysqli_query($conn, "DELETE FROM pessoa WHERE id = {$id}");
    $conn = null;
    return $result;
}

function inseri_pessoa($pessoa)
{
    $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');
    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
            VALUES ('{$pessoa['id']}', '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";
    return $result = mysqli_query($conn, $sql);
}

function update_pessoa($pessoa)
{
    // var_dump($pessoa);die;
    $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');
    $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}', endereco = '{$pessoa['endereco']}', bairro = '{$pessoa['bairro']}',
            telefone = '{$pessoa['telefone']}', email = '{$pessoa['email']}', id_cidade = '{$pessoa['id_cidade']}'
            WHERE id = {$pessoa['id']}";
    return $result = mysqli_query($conn, $sql);
}

function lista_pessoa()
{
    $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');
    $result = mysqli_query($conn, "SELECT * FROM pessoa ORDER BY id");
    // mysqli_fetch_assoc retorna 1 linha de codigo, não apropriado;
    // $pessoas = mysqli_fetch_assoc($result);
    $pessoas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $conn = null;
    // var_dump($pessoas);die;
    return $pessoas;
}

function get_next_pessoa()
{
    $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');
    $result = mysqli_query($conn, "SELECT max(id) as next from pessoa");
    $row = mysqli_fetch_assoc($result);
    return $next = (int) $row['next'] + 1;
}