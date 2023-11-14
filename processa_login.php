<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "estacio@estacio";
$dbname = "faculdade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter dados do formulário
$email = $_POST['email'];
$senha = $_POST['password'];

// Consultar o banco de dados para verificar o login
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido
    header("Location:  /index.html");
} else {
    // Login falhou
    echo "Login falhou. Verifique suas credenciais.";
}

$conn->close();
?>