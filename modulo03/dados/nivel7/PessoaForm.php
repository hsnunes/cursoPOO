<?php

require __DIR__ . '/classes/pessoa.php';
require __DIR__ . '/classes/cidade.php';

class PessoaForm
{
    /**
     * Atributo carrega o html da pagina a ser visualizada, iniciado no construtor
     *
     * @html [string]
     */
    private $html;
    /**
     * Atributo que carrega informações passadas;
     *
     * @data [array]
     */
    private $data;


    /**
     * Construtor inicializando o html e os dados do usuario
     */
    public function __construct()
    {

        /**
         * inicia o html da pagina
         */
        $this->html = file_get_contents('formPessoa.html');
        /**
         * Inicia o Array Dados da Pessoa
         */
        $this->data = [ 'id' => null,
                        'nome' => null,
                        'endereco' => null,
                        'bairro' => null,
                        'telefone' => null,
                        'email' => null,
                        'id_cidade' => null ];
        
        /**
         * Lista de cidades em options para ser trocado no template
         */
        $cidades = '';
        foreach (Cidade::all() as $cidade)
        {
            /**
             * Constroi um string com options das cidades com seu id e nome
             */
            $cidades .= "<option value='{$cidade['id']}'>{$cidade['nome']}</option>";
        }
        $this->data['cidades'] = $cidades;
    }

    /**
     * edit: Prepara o formulário para edição do registro
     *
     * @param [array] $param
     * @return void
     */
    public function edit($param)
    {
        try
        {
            $id = (int) $param['id'];
            $this->data = Pessoa::find($id);

        }
        catch (\Exception $e)
        {
            print $e->getMessage();
        }
    }

    /**
     * save: Salva ou atualiza os dados do formulário
     *
     * @param [array] $param
     * @return void
     */
    public function save($param)
    {
        try
        {
            Pessoa::save($param);
            $this->data = $param;
            print "Pessoa cadastrada!";
        }
        catch (\Exception $e)
        {
            print $e->getMessage();
        }
    }

    /**
     * show: Exibe o html de resposta ao servidor, servido a pagina
     *
     * @return void
     */
    public function show()
    {
        $this->html = str_replace('{id}', $this->data['id'], $this->html);
        $this->html = str_replace('{nome}', $this->data['nome'], $this->html);
        $this->html = str_replace('{endereco}', $this->data['endereco'], $this->html);
        $this->html = str_replace('{bairro}', $this->data['bairro'], $this->html);
        $this->html = str_replace('{telefone}', $this->data['telefone'], $this->html);
        $this->html = str_replace('{email}', $this->data['email'], $this->html);

        $this->html = str_replace('{cidades}', $this->data['cidades'], $this->html);
        
        print $this->html;
    }

}
