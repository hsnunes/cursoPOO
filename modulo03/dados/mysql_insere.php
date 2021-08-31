<?php

/**
 * Conexão com Base de dados estruturada
 * Banco cursopoo;
 * tabela famosos;
 */
$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');

/**
 * Inserindo alguns dados para estudo
 */
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (1, 'Bruno Nunes') ");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (2, 'Eloa Nunes') ");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (3, 'Paulo Nunes') ");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (4, 'Madalena Nunes') ");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (5, 'Hilder Nunes') ");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (6, 'Kaleo Nunes') ");
mysqli_query($conn, "INSERT INTO famosos (codigo, nome) VALUES (7, 'Vitor Nunes') ");
mysqli_close($conn);


// print "<pre>";
// print_r($conn);

