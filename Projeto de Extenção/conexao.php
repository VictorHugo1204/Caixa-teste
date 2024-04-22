<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "controle_caixa";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
