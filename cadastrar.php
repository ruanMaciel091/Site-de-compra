<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nascimento'];

    $sql = "INSERT INTO clientes (nome, email, senha, cpf, data_nascimento)
            VALUES ('$nome', '$email', '$senha', '$cpf', '$data_nasc')";
    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso! <a href='login.php'>Fazer login</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
    $conn->close();
} else {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
</head>
<body>
    <h2>Cadastro de Cliente</h2>
    <form method="POST" action="">
        Nome: <input type="text" name="nome" required><br><br>
        E-mail: <input type="email" name="email" required><br><br>
        CPF: <input type="text" name="cpf" required><br><br>
        Data de Nascimento: <input type="date" name="data_nascimento"><br><br>
        Senha: <input type="password" name="senha" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    <p><a href="login.php">Já tem conta? Login</a></p>
</body>
</html>
<?php } ?>
