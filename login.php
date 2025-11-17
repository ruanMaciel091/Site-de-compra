<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM clientes WHERE email='$email' AND ativo=1 LIMIT 1";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['id_clientes'] = $usuario['id_clientes'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: index.php");
            exit;
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        E-mail: <input type="email" name="email" required><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="submit" value="Entrar">
        <button type="button" onclick="window.location.href='index.php'">Voltar</button>
    </form>
    <?php if (!empty($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <p><a href="cadastrar.php">Ainda não tem conta? Cadastrar</a></p>

</body>
</html>
