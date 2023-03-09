<?php
    
    include("../conexao.php");

    if(!isset($_GET['id'])){
        die("Fornecedor não existe");
    }

    $id = $_POST['id'];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $razao_social = $_POST["razao_social"];
    $conta = $_POST["conta"];
    $agencia = $_POST["agencia"];

    if(isset($id) && isset($nome) && isset($email) && isset($telefone) && isset($razao_social) && isset($conta) && isset($agencia)){
        $sql = "UPDATE fornec SET nome = :nome, telefone = :telefone, email = :email, razao_social = :razao_social, conta = :conta, agencia = :agencia WHERE id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":telefone", $telefone);
        $stmt->bindValue(":razao_social", $razao_social);
        $stmt->bindValue(":conta", $conta);
        $stmt->bindValue(":agencia", $agencia);
        $stmt->execute();

        header("Location: TelaListagem.php");
        exit();
    }else{
        die("Dados do formulário não preenchido");
    }