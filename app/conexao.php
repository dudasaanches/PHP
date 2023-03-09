<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "aplication";
$dns = "mysql:host=$host;dbname=$banco;";

try{
    $conexao = new PDO($dns, $usuario, $senha);
}catch(\PDOException $e){
    var_dump($e-> getMessage());
}