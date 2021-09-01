<?php


function lista_combo_cidades( $id_cidade )
{
    $conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');

    $query = "SELECT * FROM cidade";
    $result = mysqli_query($conn, $query);
    $output = '';
    if ($result)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $check = $row['id'] == $id_cidade ? 'selected' : '';
            $output .= "<option {$check} value='{$row['id']}'>{$row['nome']}</option>";
        }
    }
    $conn = null;
    return $output;

}
// function lista_combo_cidades()
// {

//     try
//     {
    
//         $conn = new PDO("mysql:host=127.0.0.1;dbname=cursopoo", 'root', 'root');
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//         $result = $conn->query("SELECT id, nome FROM cidade");
//         $output = '';
//         if ($result)
//         {
//             while( $row = $result->fetchObject() )
//             {
//                 $output .= "<option value='{$row->id}'>{$row->nome}</option>";
//             }
//         }
//         return $output;

//     } catch (PDOException $e)
//     {
//         return $e->getMessage();
//     }
// }