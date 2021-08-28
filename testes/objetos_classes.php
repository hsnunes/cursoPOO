<?php

use Funcionario as GlobalFuncionario;

class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;
    
}

class Estagiario extends Funcionario
{
    public $bolsa;
}

$bru = new Funcionario;
$elo = new Estagiario;

print get_class( $bru ). '<br >';
print get_class( $elo ). '<br >';

print get_parent_class( $elo ). '<br >';