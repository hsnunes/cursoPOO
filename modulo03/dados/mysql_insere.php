<?php

/**
 * Conexão com Base de dados estruturada
 * Banco cursopoo;
 * tabela famosos;
 */
$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'cursopoo');

print "<pre>";
print_r($conn);

