<?php
session_start();
include 'conexao.php';

$data_transacao = $_POST['data_transacao'];
$descricao = $_POST['descricao'];
$origem = $_POST['origem'];
$tipo_operacao = $_POST['tipo_operacao'];
$categoria_despesa = isset($_POST['categoria_despesa']) ? $_POST['categoria_despesa'] : '';
$origem_renda = isset($_POST['origem_renda']) ? $_POST['origem_renda'] : '';
$forma_pagamento = $_POST['forma_pagamento'];
$valor = $_POST['valor'];

$sql = "INSERT INTO caixa (data_transacao, descricao, origem, tipo_operacao, categoria_despesa, origem_renda, forma_pagamento, valor)
VALUES ('$data_transacao', '$descricao', '$origem', '$tipo_operacao', '$categoria_despesa', '$origem_renda', '$forma_pagamento', '$valor')";

if ($conn->query($sql) === TRUE) {
    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=sistema.php'>";
} else {
    echo "Erro ao registrar transação: " . $conn->error;
}

$conn->close();
?>
