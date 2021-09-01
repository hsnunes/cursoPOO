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
        if ( !empty($_GET['id']) )
        {
            $id = (int) $_GET['id'];
            $conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');
            $result = mysqli_query($conn, "SELECT * FROM pessoa WHERE id = {$id}");
            $row = mysqli_fetch_assoc($result);

        }

        ?>
        <form action="pessoa_save_insert.php" method="post" enctype="multipart/form-data">

            <h1 class="titleForm">Formulário de Edição de Pessoas</h1>

            <div class="control-form">
                <label for="codigo">Código</label>
                <input type="text" name="codigo" id="id" readonly="<?=$row['id']?>" value="<?=$row['id']?>">
            </div>
            
            <div class="control-form">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?=$row['nome']?>">
            </div>
            
            <div class="control-form">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?=$row['endereco']?>">
            </div>
            
            <div class="control-form">
                <label for="codigo">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="<?=$row['bairro']?>">
            </div>
            
            <div class="control-form">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="<?=$row['telefone']?>">        
            </div>

            <div class="control-form">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?=$row['email']?>">        
            </div>

            <div class="control-form">
                <label for="_id_cidade">Cidade</label>
                <select name="id_cidade" id="cidade">
                    <option selected>Selecione</option>
                    <?php
                        require "lista_combo_cidades.php";
                        print lista_combo_cidades();
                    ?>
                </select>
            </div>

            <input type="submit" value="Atualizar">

            <!-- <button type="submit">Gravar</button> -->
        </form>
    </div>
</body>
</html>