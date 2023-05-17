<?php

$usuario = 'root';
$senha = '97684879';
$database = 'db_servico';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}
?>
