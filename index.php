<?php
session_start();
if ((isset($_SESSION['id_clientes']) && !empty($_SESSION['id_clientes']))) {
    echo "<h2>Bem-vindo, " . htmlspecialchars($_SESSION['nome']) . "!</h2>";
    echo "<p><a href='logout.php'>Logout</a></p>";
} else {
    echo "";
}
?>
<link rel="stylesheet" href="style.css">

<div class="login-container">
    <h1>Login</h1>

    <form action="login_auth.php" method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>

    <a href="cadastrar.php">Criar uma conta</a>
</div>



