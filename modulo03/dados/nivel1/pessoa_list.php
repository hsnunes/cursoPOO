<html>
    <head>
        <meta charset="utf-8">
        <title>Listagem Pessoas</title>
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <div class="container">
            <table border="1">
                <thead>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>id</td>
                        <td>Nome</td>
                        <td>endereco</td>
                        <td>Bairro</td>
                        <td>Telefone</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');

                        $result = mysqli_query($conn, "SELECT * FROM pessoa ORDER BY id");
                        while($row = mysqli_fetch_assoc($result))
                        {
                            print "<tr>";
                            print "<td> <a href='pessoa_form_edit.php?id={$row['id']}'>Up</a> </td>";
                            print "<td> <a href='pessoa_delete.php?id={$row['id']}'>Del</a> </td>";
                            print "<td>{$row['id']}</td>";
                            print "<td>{$row['nome']}</td>";
                            print "<td>{$row['endereco']}</td>";
                            print "<td>{$row['bairro']}</td>";
                            print "<td>{$row['telefone']}</td>";
                            print "<tr>";
                        }
                    ?>
                </tbody>
            </table>
            <button onclick="window.location='pessoa_form_insert.php'" style="width:170px">
                Inserir
            </button>
        </div>
    </body>

</html>