<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "estacio@estacio";
    $dbname = "faculdade";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); 

    
    $sql = "INSERT INTO usuarios (nome, sobrenome, idade, email, senha) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $nome, $sobrenome, $idade, $email, $senha);

    if ($stmt->execute()) {
        echo "Registro bem-sucedido. Você pode fazer login agora.";
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
}
?>
