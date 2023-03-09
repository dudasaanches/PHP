<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    //saber se o ID do usuário foi passado
    if(!isset($_GET['id'])){
        die("ID do usuário inválido");
    }

    //obte, o id do usuário
    $id = $_GET['id'];

    $sql = "SELECT *FROM fornec WHERE id = :id";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$row){
        die("Usuário não encontrado");
    }
    ?>
    
    <div class="container">
    <h1>Fornecedor</h1>
    <form action="<?php echo "atualizar.php?id={$id}" ?>" method="POST">
        <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
        
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required value="<?php echo $row['nome'] ?>">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Informe seu E-mail" required value="<?php echo $row['email'] ?>">

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" placeholder="Informe o Telefone" required maxlength="20" value="<?php echo $row['telefone'] ?>">

        <label for="razao_social">Nome da Empresa</label>
        <input type="text" name="razao_social" id="razao_social" placeholder="Informe o nome da empresa" required value="<?php echo $row['razao_social'] ?>">

        <label for="conta">Conta</label>
        <input type="number" name="conta" id="conta" placeholder="Informe a conta" required value="<?php echo $row['conta'] ?>">

        <label for="agencia">Agência</label>
        <input type="number" name="agencia" id="agencia" placeholder="Informe a agência" required value="<?php echo $row['agencia'] ?>">

        <button type="submit">Atualizar</button>
    </form>
    
    <?php
    include("../config/rodape.php");
    ?>