<?php
$servername = "localhost";
$username = "root";
$password = "estacio@estacio";
$dbname = "faculdade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro ao acessar o banco de dados: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nome, sobrenome, idade, email, senha) VALUES ('$nome', '$sobrenome', '$idade', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    header("Location: /faculdade/index.html?sucesso=1");
    exit;
} else {
    echo "Algo deu errado, verifique novamente! " . $conn->error;
}

$conn->close();
?>


