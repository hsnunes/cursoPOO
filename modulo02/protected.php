<?php

class Pessoa
{
    // PHP Notice:  Undefined property: Funcionario::$nome in protected.php on line 
    // private $nome;

    // protected pode ser editado pelas classes filhas
    protected $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }
}

class Funcionario extends Pessoa
{
    private $cargo, $salario;

    public function contrata($cargo, $salario)
    {
        $this->cargo = $cargo;
        $this->salario = $salario;
    }

    public function getInfo()
    {
        print "Nome= {$this->nome}, Salário= {$this->salario}";
    }
    
}

$p1 = new Funcionario('Bruno Nunes');
$p1->contrata('Gamer', 1500);
print $p1->getInfo();
