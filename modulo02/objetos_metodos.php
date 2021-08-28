<?php

class Funcionario
{
    public function setSalario()
    {
        # code...
    }

    public function getSalario()
    {
        # code...
    }

    public function setNome()
    {
        # code...
    }

    public function getNome()
    {
        # code...
    }
    
}


echo '<pre>';

print_r( get_class_methods('Funcionario') );

echo '</pre>';