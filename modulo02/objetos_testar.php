<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $departamento;
    function setSalario(){}
    function getSalario(){}
    
}

$eloa = new Funcionario;

if ( method_exists($eloa, 'setNome') )
{
    print "Existe o metodo setNome<br >";
}
if (  method_exists($eloa, 'setSalario') )
{
    print "Existe o metodo SetSalario";
}