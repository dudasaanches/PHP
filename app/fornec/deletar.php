<?php

include("../conexao.php");

    //verificar se id foi fornecido
    if(!isset($_GET['id'])){
        die("ID do usuário não foi fornecido");
    }else{
        $id = $_GET['id'];

        $sql = "DELETE FROM fornec WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        header("Location: TelaListagem.php");
        exit;
    }