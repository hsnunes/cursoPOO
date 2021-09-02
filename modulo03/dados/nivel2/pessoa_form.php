<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Pessoa</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <?php
            $dd = $_REQUEST;
            $id = ($_REQUEST['id']) ?? null;
            $nome = ($_REQUEST['nome']) ?? null;
            $endereco = ($_REQUEST['endereco']) ?? null;
            $bairro = ($_REQUEST['bairro']) ?? null;
            $telefone = ($_REQUEST['telefone']) ?? null;
            $email = ($_REQUEST['email']) ?? null;
            $id_cidade = ($_REQUEST['id_cidade']) ?? null;
        if (!empty($_REQUEST['action']))
        {
            $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');

            if ($_REQUEST['action'] == 'edit')
            {
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
                                                telefone = '{$telefone}', email = '{$email}', id_cidade = '{$id_cidade}'";
                    $result = mysqli_query($conn, $sql);
                }
                print ($result) ? 'Registro Salvo!' : 'Erro no Registro!';
            }
        }
        ?>
        <form action="pessoa_form.php?action=save" method="post" enctype="multipart/form-data">

            <h1 class="titleForm">Formulário de Edição de Pessoas</h1>

            <div class="control-form">
                <label for="id">Código</label>
                <input type="text" name="id" id="id" readonly="<?=$id?>" value="<?=$id?>">
            </div>
            
            <div class="control-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?=$nome?>">
            </div>
            
            <div class="control-form">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?=$endereco?>">
            </div>
            
            <div class="control-form">
                <label for="codigo">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="<?=$bairro?>">
            </div>
            
            <div class="control-form">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="<?=$telefone?>">        
            </div>

            <div class="control-form">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?=$email?>">        
            </div>

            <div class="control-form">
                <label for="_id_cidade">Cidade</label>
                <select name="id_cidade" id="cidade">
                    <?php
                        require "lista_combo_cidades.php";
                        print lista_combo_cidades($id);
                    ?>
                </select>
            </div>

            <input type="submit" value="Atualizar">

            <!-- <button type="submit">Gravar</button> -->
        </form>
    </div>
</body>
</html>