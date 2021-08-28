<?php

class Software
{
    private $id;
    private $nome;
    
    // Quando não esta o public ela será automaticamente
    // static $contador;
    private static $contador;

    public function __construct($nome)
    {
        // Muda o atributo da classe;
        // modifica o atributo e mantem o valor modificado
        self::$contador ++;

        $this->id = self::$contador;
        $this->nome = $nome;
    }

    public static function getContador()
    {
        return self::$contador;
    }
    
}

$s1 = new Software('Gimp');
$s2 = new Software('Gnumeric');

print '<pre>';

print_r($s1);
print_r($s2);

// Visto por que a propriedae esteja publica
// var_dump(Software::$contador);
// Atraves de uma metodo publico a visibilidade global volta
var_dump( Software::getcontador() );

// Pòde mudar por qualquer valor, ate os que não podem
// Software::$contador = 'x'; 

print '</pre>';


