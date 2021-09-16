<?php
// require __DIR__ . '/db/pessoa_db.php';
require __DIR__ . '/classes/pessoa.php';
require __DIR__ . '/classes/cidade.php';

            $pessoa              = [];
            $pessoa['id']        = '';
            $pessoa['nome']      = '';
            $pessoa['endereco']  = '';
            $pessoa['bairro']    = '';
            $pessoa['telefone']  = '';
            $pessoa['email']     = '';
            $pessoa['id_cidade'] = '';

            $txtSubmit = 'Inserir';
        if (!empty($_REQUEST['action']))
        {
            // $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');

            try {

                if ($_REQUEST['action'] == 'edit')
                {
                    $txtSubmit = 'Atualizar';
                    if ( !empty($_REQUEST['id']) )
                    {
                        $id = (int) $_REQUEST['id'];
                        // $result = mysqli_query($conn, "SELECT * FROM pessoa WHERE id = {$id}");
                        // $row = mysqli_fetch_assoc($result);
                        // $pessoa = get_pessoa($id);
                        $pessoa = Pessoa::find($id);
    
                    }
            
                }
                else if ($_REQUEST['action'] == 'save')
                {
    
                    $pessoa = $_POST;
                    $id = $_POST['id'];
                    // var_dump($pessoa);die;
                    Pessoa::save($pessoa);
                    // if (empty($_REQUEST['id']))
                    // {
    
                    //     // $result = mysqli_query($conn, "SELECT max(id) as next from pessoa");
                    //     // $row = mysqli_fetch_assoc($result);
                    //     // $next = (int) $row['next'] + 1;
                    //     // $pessoas['id'] = get_next_pessoa();
                    //     // print_r($pessoas);die;
    
                    //     // $sql = "INSERT INTO pessoa (id, nome, endereco, bairro, telefone, email, id_cidade)
                    //     //         VALUES ({$next},'{$nome}','{$endereco}','{$bairro}','{$telefone}','{$email}','{$id_cidade}')";
                    //     // $result = mysqli_query($conn, $sql);
                    //     // $result = inseri_pessoa($pessoa);
                    // }
                    // else
                    // {
                    //     // $id = $_POST;
                    //     // $sql = "UPDATE pessoa SET nome = '{$nome}', endereco = '{$endereco}', bairro = '{$bairro}',
                    //     //                             telefone = '{$telefone}', email = '{$email}', id_cidade = '{$id_cidade}'
                    //     //                             WHERE id = {$id}";
                    //     // $result = mysqli_query($conn, $sql);
                    //     // $result = update_pessoa($pessoa);
                    // }
                    header('Location: pessoa_list.php');
                    die;
                    // print ($result) ? 'Registro Salvo!' : 'Erro no Registro!';
                }


            } catch (Exception $e)
            {
                print $e->getMessage();
            }


        }
        $formTpl = file_get_contents('formPessoa.html');
        $formTpl = str_replace('{id}', $pessoa['id'], $formTpl);
        $formTpl = str_replace('{nome}', $pessoa['nome'], $formTpl);
        $formTpl = str_replace('{endereco}', $pessoa['endereco'], $formTpl);
        $formTpl = str_replace('{bairro}', $pessoa['bairro'], $formTpl);
        $formTpl = str_replace('{telefone}', $pessoa['telefone'], $formTpl);
        $formTpl = str_replace('{email}', $pessoa['email'], $formTpl);
        $formTpl = str_replace('{id_cidade}', $pessoa['id_cidade'], $formTpl);
        $formTpl = str_replace('{txtSubmit}', $txtSubmit, $formTpl);

        require "lista_combo_cidades.php";
        
        $cidades = lista_combo_cidades($pessoa['id_cidade']);
        // $cidades = Cidade::all();
        // echo '<pre>';
        // print_r($cidades);die;
        
        $formTpl = str_replace('{cidades}', $cidades, $formTpl);

        print $formTpl;


