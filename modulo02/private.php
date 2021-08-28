<?php

class Pessoa
{
    private $nome;
    private $endereco;
    private $nascimento;

    public function __construct($nome, $endereco)
    {
        $this->nome = $nome;
        $this->endereco = $endereco;
    }

    
    // Como se edita os atributos da classe, atraves de metodos publicos
    public function setNascimento($nascimento)
    {
        // Dentro do metodo, podem ser feitas validações para proteger os atributos
        $partes = explode('-', $nascimento);
        if (count($partes) == 3)
        {
            if (checkdate($partes[1], $partes[2], $partes[3]))
            {
                $this->nascimento = $nascimento;
                return true;
            }
            return false;
        }
        return false;
    }
}

$p1 = new Pessoa('Maria Jose', 'Rua Bom Jardim, 321');
// $p1->nome = 'Maria Jose';
// $p1->endereco = 'Rua Bom Jardim, 321';
// Pelo fato de ser publico, fica sujeito a esets dados variados
// $p1->nascimento = '01-02-1991';
// $op1 = $p1->setNascimento( '01 de maio de 1990');
$op2 = $p1->setNascimento('1990-05-01');

echo '<pre>';


print_r($op2);
print_r($op1);
print_r($p1);

echo '</pre>';