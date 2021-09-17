<?php

/**
 * Classe para manipulação de arquivos CSV
 */
class CSVParser
{

    /**
     * Recebe o caminho do arquivo a ser lido
     * @var string
     */
    private $filename;
    /**
     * Recebe o tipo de delimitador do arquivo
     * @var string
     */
    private $separator;
    /**
     * Contador de linhas no ponto atual, incrementado quando lidos outras linhas     *
     * @var int
     */
    private $counter;
    /**
     * Vetor de dados extraidos do arquivo, armazanando os dados
     * @var array
     */
    private $data;
    /**
     * Atributo com as colunas do arquivo, captura cada linha como um
     * dado de vetor
     * @var array
     */
    private $header;
    /**
     * Construtor: recebe o arquivo e o delimitador do arquivo
     * E alimenta os atributos filename e separator
     */
    public function __construct($filename, $separator = ',')
    {
        $this->filename = $filename;
        $this->separator = $separator;
        $this->counter = 1;
    }

    /**
     * Metodo para fazer a leitura e extração dos dados do arquivo
     * @return void
     */
    public function parse()
    {
        /**SE o arquivo não existir */
        if (!file_exists($this->filename))
        {
            // Não é uma boa pratica o die, em algumas situações
            // die("Arquivo {$this->filename} não existe");
            return false;
        }

        /** Se o arquivo não tiver permissão de leitura */
        if (is_readable($this->filename))
        {
            // Não é uma boa pratica o die, em algumas situações
            // die("Arquivo {$this->filename} sem permissão de leitura");
            return false;
        }

        /**
         * Metodo file(); extrai as informações do arquivo e atribui
         * ao vetor data da classe
         */
        $this->data   = file($this->filename);
        /**
         * header: recebe as colunas do arquivo, a primeira linha
         * extraida do arquivo csv
         */
        $this->header = str_getcsv($this->data[0], $this->separator);
        return true;
    }

    public function fetch()
    {
        /**
         * Fazer a verificação se tem dados na linha 1 do csv
         * lembrando que a linha 0, ficam as colunas
         */
        if (isset($this->data[$this->counter]))
        {
            /**
             * Pega uma linha do arquivo, e incrementa o counter;
             * Cria um vetor com key numerica
             */
            $row = str_getcsv($this->data[$this->counter ++], $this->separator);
            foreach ($row as $key => $value)
            {
                /**
                 * Gerando um vetor com o nome na key
                 */
                $row[$this->header[$key]] = $value;
            }
            /**
             * retorn o vetor completo com as linas do arquivo
             */
            return $row;
        }
    }

}