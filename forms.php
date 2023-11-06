<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Processamento de Formulário</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $cidade = $_POST["cidade"];
    $mensagem = $_POST["mensagem"];

    // Você pode fazer o que quiser com os dados aqui, como enviá-los por e-mail, salvar no banco de dados, etc.

    // Exemplo: exibindo uma mensagem de agradecimento
    echo "<h1>Obrigado por entrar em contato, $nome!</h1>";
    echo "<p>Sua mensagem foi recebida com sucesso.</p>";
} else {
    echo "<h1>Ocorreu um erro no envio do formulário.</h1>";
}
?>

</body>
</html>
