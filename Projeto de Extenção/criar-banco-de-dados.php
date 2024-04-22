<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "controle_caixa";

// Cria a conexão
$conn = mysqli_connect($servername, $username, $password, $dbname)or die ("Falha na conexão com MySQL");

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Cria a tabela de usuários
$sql_usuarios = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
)";

if ($conn->query($sql_usuarios) === TRUE) {
    echo "Tabela de usuários criada com sucesso ou já existente.<br>";
} else {
    echo "Erro ao criar a tabela de usuários: " . $conn->error . "<br>";
}

// Cria a tabela de transações de caixa
$sql_caixa = "CREATE TABLE IF NOT EXISTS caixa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data_transacao DATE NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    origem VARCHAR(100) NOT NULL,
    tipo_operacao ENUM('Renda', 'Despesa') NOT NULL,
    categoria_despesa VARCHAR(100),
    origem_renda ENUM('Estoque', 'Encomenda'),
    forma_pagamento VARCHAR(100) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL
)";

if ($conn->query($sql_caixa) === TRUE) {
    echo "Tabela de transações de caixa criada com sucesso ou já existente.<br>";
} else {
    echo "Erro ao criar a tabela de transações de caixa: " . $conn->error . "<br>";
}

// Fecha a conexão
$conn->close();
?>
