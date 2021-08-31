<?php

$conn = mysqli_connect("127.0.0.1", 'root', 'root', 'cursopoo');

$query = "SELECT * FROM famosos";

$result = mysqli_query($conn, $query);

if ($result)
{
    while( $row = mysqli_fetch_assoc($result) )
    {
        print "{$row['codigo']} - {$row['nome']} <br >";
    }
}