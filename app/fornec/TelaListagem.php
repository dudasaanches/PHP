<?php

    include("../config/cabecalho.php");
    include("../conexao.php");

    $sql = "SELECT id, nome, email, telefone, razao_social, conta, agencia FROM fornec";

    $resultado = $conexao->query($sql);
    if($resultado->rowCount() > 0){
        echo "<table border=1>";
        echo "
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Telefone</th>
                <th>Nome da Empresa</th>
                <th>Conta</th>
                <th>Agência</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        ";
        foreach ($resultado as $row){
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["nome"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["telefone"]."</td>";
            echo "<td>".$row["razao_social"]."</td>";
            echo "<td>".$row["conta"]."</td>";
            echo "<td>".$row["agencia"]."</td>";
            echo '<td><a href="TelaEditar.php?id='.$row['id'].'">Editar</a></td>';
            echo '<td><a href="deletar.php?id='.$row['id'].'">Excluir</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    }else{
        echo "Nenhum dado encontrado";
    }
 
    include("../config/rodape.php");