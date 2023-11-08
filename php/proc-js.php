<?php
session_start(); // Inicie a sessão para armazenar informações do usuário

$servername = "localhost";
$username = "root";
$password = "estacio@estacio";
$dbname = "faculdade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$email = $_POST["email"];
$senha = $_POST["senha"];

// Consulta para verificar as credenciais do usuário no banco de dados
$sql = "SELECT nome, email FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido
    $row = $result->fetch_assoc();
    $_SESSION["nome"] = $row["nome"]; // Armazene o nome do usuário na sessão

    header("Location: /faculdade/index.html?sucesso=2&nome=" . $row["nome"]);
    exit;
} else {
    echo "Credenciais inválidas. Por favor, tente novamente.";
}

$conn->close();
?>
