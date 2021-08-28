<?php

class Pessoa
{
    public $nome;
    public $endereco;
    public $nascimento;
}

$p1 = new Pessoa;
$p1->nome = 'Maria Jose';
$p1->endereco = 'Rua Bom Jardim, 321';
// Pelo fato de ser publico, fica sujeito a esets dados variados
// $p1->nascimento = '01-02-1991';
$p1->nascimento = '01 de maio de 1990';

echo '<pre>';

print_r($p1);

echo '</pre>';