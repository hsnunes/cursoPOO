<?php

class Cidade
{
    public static function all()
    {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=cursopoo', 'root', 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM cidade ORDER BY id";
        $result = $conn->query($sql);
        return $result->fetchall();
    }
}
