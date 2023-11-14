<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "estacio@estacio";
$dbname = "faculdade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro ao acessar o banco de dados: " . $conn->connect_error);
}

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT nome, email FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row["senha"])) {
        $_SESSION["nome"] = $row["nome"];
        header("Location: /faculdade/index.html?sucesso=2&nome=" . $row["nome"]);
        exit;
    }
}

// Credenciais inválidas, redirecione para a página de login com uma mensagem de erro
header("Location: /faculdade/login.html?erro=1");
exit;

$conn->close();
?>