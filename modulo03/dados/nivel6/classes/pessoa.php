<?php

class Pessoa
{

    private static $conn;

    public static function getConnect()
    {
        if (empty(self::$conn))
        {
            self::$conn = new PDO('mysql:host=127.0.0.1;dbname=cursopoo', 'root', 'root');
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    public static function find($id)
    {

        $conn = self::getConnect();

        $sql = "SELECT * FROM pessoa WHERE id = {$id}";
        $result = $conn->query($sql);
        return $result->fetch();
    }

    public static function delete($id)
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=cursopoo', 'root', 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM pessoa WHERE id = {$id}";
        return $conn->query($sql);
    }

    public static function all()
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=cursopoo', 'root', 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM pessoa ORDER BY id";
        $result = $conn->query($sql);
        return $result->fetchAll();
    }

    public static function save($pessoa)
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=cursopoo', 'root', 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (empty($pessoa['id']))
        {
            $result = mysqli_query($conn, );
            $sql = "SELECT max(id) as next from pessoa";
            // $sql = "SELECT (max)id as next FROM pessoa";
            $rs = $conn->query($sql);
            $ln = $rs->fetch();
            // var_dump($ln);die;
            $pessoa['id'] = (int) $ln['next']+1;

            $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
            VALUES ('{$pessoa['id']}', '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', '{$pessoa['id_cidade']}')";
        }
        else
        {
            $sql = "UPDATE pessoa SET nome = '{$pessoa['nome']}', endereco = '{$pessoa['endereco']}', bairro = '{$pessoa['bairro']}',
            telefone = '{$pessoa['telefone']}', email = '{$pessoa['email']}', id_cidade = '{$pessoa['id_cidade']}'
            WHERE id = {$pessoa['id']}";
        }
        return $conn->query($sql);
    }

}