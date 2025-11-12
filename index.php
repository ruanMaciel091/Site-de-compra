<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Início</title>
</head>
<body>
    <h2>Bem-vindo à Loja</h2>
    <p><a href="login.php">Login</a></p>
    <p><a href="cadastrar.php">Cadastrar</a></p>
</body>
</html>
<?php
session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    echo "Bem-vindo, " . $_SESSION['nome'] . "!";
} else {
    echo "Você não está logado. Por favor, faça o login.";
}
?>