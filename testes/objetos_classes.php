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

// chamado pela variável
print get_parent_class( $elo ). '<br >';
// chamado pelo nome da classe
print get_parent_class( 'Estagiario' ). '<br >';

// Verifica se uma classe é filha da classe passada, verificação
print "E subclasse? ". (is_subclass_of( $elo, 'Funcionario' ) ? 'SIM' : 'NÃO'). '<br >';