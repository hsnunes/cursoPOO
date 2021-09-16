
    <?php
        // $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');
        // require __DIR__ . '/db/pessoa_db.php';
        require __DIR__ . '/classes/pessoa.php';
        require __DIR__ . '/classes/cidade.php';

        try
        {

            if ( !empty($_GET['action']) AND $_GET['action'] == 'delete' )
            {
                $id = (int) $_GET['id'];
                // $result = mysqli_query($conn, "DELETE FROM pessoa WHERE id = {$id}");
                // $result = exclui_pessoa($id);
                $pessoas = Pessoa::delete($id);
    
            }
    
            /* Templates do programa */
            $listaTpl = file_get_contents('listPessoa.html');
    
            // $result = mysqli_query($conn, "SELECT * FROM pessoa ORDER BY id");
            // $pessoas = lista_pessoa();
            $pessoas = Pessoa::all();
    
        }
        catch (Exception $e)
        {
            print $e->getMessage();
        }

        // print_r($pessoas);die;
        $linhas = '';

        if ($pessoas)
        {
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
        }

        $conn = null;
        $listaTpl = str_replace('{linhas}', $linhas, $listaTpl);

        print $listaTpl;
