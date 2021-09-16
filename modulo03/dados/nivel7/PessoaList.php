<?php

require __DIR__ . '/classes/pessoa.php';

class PessoaList
{

    /**
     * html: carrega o template html da aplicação
     *
     * @param $html [string]
     */
    private $html;

    /**
     * Construtor alimenta o atributo $html com o template
     */
    public function __construct()
    {
        $this->html = file_get_contents('listPessoa.html');
    }

    /**
     * delete: Excluir Pessoas do banco
     *
     * @param [int] $id
     * @return void
     */
    public function delete($param)
    {
        try
        {
            $id = (int) $param['id'];
            Pessoa::delete($id);
        }
        catch (\Exception $e)
        {
            print $e->getMessage();
        }
    }

    /**
     * Load: Carrega um template com a busca de pessoas no banco
     * Alimenta a o template da aplicação
     *
     * @return void
     */
    public function load()
    {

        $linhas = '';
        $pessoas = Pessoa::all();
        foreach($pessoas as $pessoa)
        {
            $linha = file_get_contents('linha_pessoaList.html');
            $linha = str_replace('{id}', $pessoa['id'], $linha);
            $linha = str_replace('{nome}', $pessoa['nome'], $linha);
            $linha = str_replace('{endereco}', $pessoa['endereco'], $linha);
            $linha = str_replace('{bairro}', $pessoa['bairro'], $linha);
            $linha = str_replace('{telefone}', $pessoa['telefone'], $linha);
            $linhas .= $linha;
        }
        $this->html = str_replace('{linhas}', $linhas, $this->html);
    }

    /**
     * Monstra na tela do cliente a pagina renderizada
     *
     * @return void
     */
    public function show()
    {
        $this->load();
        print $this->html;
    }
}


