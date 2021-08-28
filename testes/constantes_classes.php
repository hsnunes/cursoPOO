<?php

class Pessoa
{
    private $nome;
    private $genero;
    const GENEROS = ['M' => 'Masculino', 'F' => 'Feminino'];

    public function __construct($nome, $genero)
    {
        $this->nome = $nome;
        $this->genero = $genero;
    
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getNomeGenero()
    {
        return self::GENEROS[ $this->genero ];
    }
}

// Visibilidade publica vista de qualquer lugar do programa
// print Pessoa::GENEROS['F'];

$p1 = new Pessoa('Bruno Nunes', 'M');
$p2 = new Pessoa('Eloa Nunes', 'F');

print $p1->getNome() . '<br >';
print $p1->getNomeGenero() . '<br >';
print $p2->getNome() . '<br >';
print $p2->getNomeGenero() . '<br >';

// COmo da para acessar de qualquer lugar
var_dump(Pessoa::GENEROS);