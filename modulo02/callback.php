<?php

function apresenta($nome)
{
    print "Ola " .$nome;
}

// apresenta('Bruno');

$fn = 'apresenta';

call_user_func($fn, "Eloa");

class Pessoa
{
    public static function apresenta($nome)
    {
        print "Ola $nome";
    }
}

echo '<br >';

// Uma outra forma de chamada
$class = 'Pessoa';
$metodo = 'apresenta';
call_user_func([$class, $metodo], "HsNunes");

echo '<br >';

$obj = new Pessoa;

call_user_func([$obj, $metodo], 'Bruno');




