<?php
session_start();
$erro = null;
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once ('config.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM clientes WHERE email = '$email' AND senha = '$senha'";
    
    $data = mysqli_query($conn, $sql);

    if (mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_assoc($data);
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        header('Location: index.php');
        exit;
    } else {
        $erro = "Nome de usuário ou senha inválidos.";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="" method="POST">
        
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit" name="submit" value="Login">Login</button>
        </form>
    </div>
</body>
</html>