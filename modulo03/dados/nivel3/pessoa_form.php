
        <?php
            $dd = $_REQUEST;
            $id = (int) ($_REQUEST['id']) ?? null;
            $nome = ($_REQUEST['nome']) ?? null;
            $endereco = ($_REQUEST['endereco']) ?? null;
            $bairro = ($_REQUEST['bairro']) ?? null;
            $telefone = ($_REQUEST['telefone']) ?? null;
            $email = ($_REQUEST['email']) ?? null;
            $id_cidade = ($_REQUEST['id_cidade']) ?? null;

            $txtSubmit = 'Inserir';
        if (!empty($_REQUEST['action']))
        {
            $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');

            if ($_REQUEST['action'] == 'edit')
            {
                $txtSubmit = 'Atualizar';
                if ( !empty($_REQUEST['id']) )
                {
                    $id = (int) $_REQUEST['id'];
                    $result = mysqli_query($conn, "SELECT * FROM pessoa WHERE id = {$id}");
                    $row = mysqli_fetch_assoc($result);

                    $nome = $row['nome'];
                    $endereco = $row['endereco'];
                    $bairro = $row['bairro'];
                    $telefone = $row['telefone'];
                    $email = $row['email'];
                    $id_cidade = $row['id_cidade'];
                }
        
            }
            else if ($_REQUEST['action'] == 'save')
            {
                if (empty($_REQUEST['id']))
                {

                    $result = mysqli_query($conn, "SELECT max(id) as next from pessoa");
                    $row = mysqli_fetch_assoc($result);
                    $next = (int) $row['next'] + 1;

                    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                            VALUES ({$next},'{$nome}','{$endereco}','{$bairro}','{$telefone}','{$email}','{$id_cidade}')";
                    $result = mysqli_query($conn, $sql);
                }
                else
                {
                    $sql = "UPDATE pessoa SET nome = '{$nome}', endereco = '{$endereco}', bairro = '{$bairro}',
                                                telefone = '{$telefone}', email = '{$email}', id_cidade = '{$id_cidade}'
                                                WHERE id = {$id}";
                    $result = mysqli_query($conn, $sql);
                }
                header('Location: pessoa_list.php');
                die;
                // print ($result) ? 'Registro Salvo!' : 'Erro no Registro!';
            }
        }
        $id = 1;
        $formTpl = file_get_contents('formPessoa.html');
        $formTpl = str_replace('{id}', $id, $formTpl);
        $formTpl = str_replace('{nome}', $nome, $formTpl);
        $formTpl = str_replace('{endereco}', $endereco, $formTpl);
        $formTpl = str_replace('{bairro}', $bairro, $formTpl);
        $formTpl = str_replace('{telefone}', $telefone, $formTpl);
        $formTpl = str_replace('{email}', $email, $formTpl);
        $formTpl = str_replace('{id_cidade}', $id_cidade, $formTpl);
        $formTpl = str_replace('{txtSubmit}', $txtSubmit, $formTpl);

        require "lista_combo_cidades.php";
        $cidades = lista_combo_cidades($id);
        
        $formTpl = str_replace('{cidades}', $cidades, $formTpl);

        print_r($formTpl);die;


