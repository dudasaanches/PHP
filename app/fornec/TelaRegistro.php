<?php
    include("../config/cabecalho.php");
?>

<div class="container">
    <h1>Registro de Fornecedor</h1>
    <form action="" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Informe seu E-mail" required>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" placeholder="Informe o Telefone" required maxlength="20">

        <label for="razao_social">Nome da Empresa</label>
        <input type="text" name="razao_social" id="razao_social" placeholder="Informe o nome da empresa" required>

        <label for="conta">Conta</label>
        <input type="number" name="conta" id="conta" placeholder="Informe a conta" required>

        <label for="agencia">Agência</label>
        <input type="number" name="agencia" id="agencia" placeholder="Informe a agência" required>

        <button type="submit">Enviar</button>
    </form>

    <?php
        //conectar com o banco de dados
        include("../conexao.php");
        
        //formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $telefone = $_POST["telefone"];
            $razao_social = $_POST["razao_social"];
            $conta = $_POST["conta"];
            $agencia = $_POST["agencia"];
        
            $sql = "INSERT INTO fornec(nome, email, telefone, razao_social, conta, agencia) VALUES (:nome, :email, :telefone, :razao_social, :conta, :agencia)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":telefone", $telefone);
            $stmt->bindValue(":razao_social", $razao_social);
            $stmt->bindValue(":conta", $conta);
            $stmt->bindValue(":agencia", $agencia);
            $stmt->execute();
            

            if ($stmt->rowCount() > 0){
                echo "<div class='sucess'>Usuário cadastrado com sucesso</div>";
            }else {
                echo "<div class='error'>Falha ao registras usuário</div>";
            }

            //fechar conexão
            $conexao = null;
        }
    ?>
</div>

<?php
    include("../config/rodape.php");
?>