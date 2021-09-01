<?php

$conn = new PDO('mysql:host=127.0.0.1;dbname=cursopoo','root','root');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$next = null;

$result = $conn->query("SELECT max(id) as next from pessoa");
$result->fetchObject();