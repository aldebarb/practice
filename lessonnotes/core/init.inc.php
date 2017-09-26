<?php 
$mysqli = new mysqli('localhost', 'root', 'password', 'udemy_db');

function disconnectDb($mysqli)
{
     return $mysqli->close();
}
?>