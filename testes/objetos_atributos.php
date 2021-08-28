<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;
    
}

$jose = new Funcionario;
$jose->nome  = 'Jose Bruno';
$jose->salario = 3000;
$jose->departamento = 'Games';

print '<pre>';
// Funcção que retorna atributos publicos
print_r( get_object_vars($jose) );