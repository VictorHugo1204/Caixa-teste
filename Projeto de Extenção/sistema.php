<?php 
                session_start();
                ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle de Caixa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</h2>
        <h3>Registro de Transações de Caixa</h3>
        <form action="registrar_transacao.php" method="post">
            Data: <input type="date" name="data_transacao" required><br>
            Descrição: <input type="text" name="descricao" required><br>
            Origem: <input type="text" name="origem" required><br>
            Tipo de Operação:
            <select name="tipo_operacao" onchange="showHideCategoriaDespesa(this)">
                <option value="Renda">Renda</option>
                <option value="Despesa">Despesa</option>
            </select><br>
            <div id="categoria_despesa" style="display:none;">
                Categoria de Despesa: <input type="text" name="categoria_despesa" ><br>
            </div>
            <div id="origem_renda" style="display:none;">
                Origem da Renda:
                <select name="origem_renda">
                    <option value="Estoque">Estoque</option>
                    <option value="Encomenda">Encomenda</option>
                </select><br>
            </div>
            Forma de Pagamento: <input type="text" name="forma_pagamento" required><br>
            Valor: <input type="number" step="0.01" name="valor" required><br>
            <input type="submit" value="Registrar Transação">
        </form>

        <h3>Transações Registradas</h3>
        <table>
            <tr>
                <th>Data</th>
                <th>Descrição</th>
                <th>Origem</th>
                <th>Tipo de Operação</th>
                <th>Categoria de Despesa</th>
                <th>Origem da Renda</th>
                <th>Forma de Pagamento</th>
                <th>Valor</th>
            </tr>
            <?php
            include 'conexao.php';

            $sql = "SELECT * FROM caixa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["data_transacao"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    echo "<td>" . $row["origem"] . "</td>";
                    echo "<td>" . $row["tipo_operacao"] . "</td>";
                    echo "<td>" . $row["categoria_despesa"] . "</td>";
                    echo "<td>" . $row["origem_renda"] . "</td>";
                    echo "<td>" . $row["forma_pagamento"] . "</td>";
                    echo "<td>" . $row["valor"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Nenhuma transação registrada ainda.</td></tr>";
            }

            $conn->close();
            ?>
        </table>

        <br>
        <a href="logout.php">Sair</a>
    </div>

    <script>
        function showHideCategoriaDespesa(select) {
            var categoriaDespesa = document.getElementById("categoria_despesa");
            var origemRenda = document.getElementById("origem_renda");
            
            if (select.value == "Despesa") {
                categoriaDespesa.style.display = "block";
                origemRenda.style.display = "none";
            } else {
                categoriaDespesa.style.display = "none";
                origemRenda.style.display = "block";
            }
        }
    </script>
</body>
</html>
