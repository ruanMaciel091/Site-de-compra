<?php
session_start();
if ((isset($_SESSION['id_clientes']) && !empty($_SESSION['id_clientes']))) {
    echo "<h2>Bem-vindo, " . htmlspecialchars($_SESSION['nome']) . "!</h2>";
    echo "<p><a href='logout.php'>Logout</a></p>";
} else {
    echo "<h2>Você não está logado.</h2>";
}
?>
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
    <a href="produtos.php">Produtos</a>
</body>
</html>


