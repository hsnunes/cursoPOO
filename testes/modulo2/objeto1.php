<?php

class Produto
{
    private $descricao;
    private $estoque;
    private $preco;

    public function __construct($desc, $estoque, $preco)
    {
        $this->setDescricao($desc);
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }

    public function getEstoque($estoque)
    {
        return $this->estoque
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }


    
    
    
    
    public function aumentarEstoque($unidades)
    {
        if (is_numeric($unidades) AND $unidades >= 0)
        {
            $this->estoque += $unidades; 
        }
    }

    public function diminuiEstoque($unidades)
    {
        if (is_numeric($unidades) AND $unidades >= 0)
        {
            $this->estoque -= $unidades;
        }
    }

    public function reajustarPreco($percentual)
    {
        $this->preco *= (1 + ($percentual/100));
    }

}

$p1 = new Produto;
$p1->descricao = "chocolate";
$p1->estoque = 20;
$p1->preco = 5;

$p2 = new Produto;
$p2->descricao = "café";
$p2->estoque = 15;
$p2->preco = 8;


print $p1->descricao;
