<?php

class Orcamento
{
    private $itens;

    /** 
     * O parametro Produto firma um acoplamento fortissimo
     * Caso tivesse que acrescentar um Serviço no orcamento
     * Utilizando o metodo getPreco.
     * VIA-> Cria uma interface Orcavel, itens que podem ser usado no orçamento
     * E que terão o metodo getPreco
     * 
     * Trocando Produto hint do metodo, para a interface OrcavelInterface
     * flexbiliza para varios itens de varios tipos que possam assinar o metodo
     */
    // 
    //public function adiciona(Produto $produto, $qtde)
    public function adiciona(OrcavelInterface $produto, $qtde)
    {
        $this->itens[] = [$produto, $qtde];
    }

    public function calculaTotal()
    {
        $total = 0;
        foreach ($this->itens as $item)
        {
            var_dump($item);die;
            $total += ( $item[0] * $item[1]->getPreco() );
        }
        return $total;
    }
}