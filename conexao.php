<?php 
$usuario = 'root';
$senha = '';
$database = 'sistemadelogin';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error)
{
    die('falha ao conectar ao db' . $mysqli->error);
}