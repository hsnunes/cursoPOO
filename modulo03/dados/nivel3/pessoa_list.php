
    <?php
        $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');

        if ( !empty($_GET['action']) AND $_GET['action'] == 'delete' )
        {
            $id = (int) $_GET['id'];
            $result = mysqli_query($conn, "DELETE FROM pessoa WHERE id = {$id}");

        }

        /* Templates do programa */
        $listaTpl = file_get_contents('listPessoa.html');

        $linhas = '';
        $result = mysqli_query($conn, "SELECT * FROM pessoa ORDER BY id");
        while($row = mysqli_fetch_assoc($result))
        {

            //var_dump($row);die;
            foreach ($row as $key => $value)
            {
                // print $key . ' - '. $value;die;
                $linha = file_get_contents('linha_pessoaList.html');
                $linha = str_replace('{id}', $row['id'], $linha);
                $linha = str_replace('{nome}', $row['nome'], $linha);
                $linha = str_replace('{endereco}', $row['endereco'], $linha);
                $linha = str_replace('{bairro}', $row['bairro'], $linha);
                $linha = str_replace('{telefone}', $row['telefone'], $linha);
            }
            $linhas .= $linha;

        }

        $conn = null;
        $listaTpl = str_replace('{linhas}', $linhas, $listaTpl);

        print $listaTpl;
