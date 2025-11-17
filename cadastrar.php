<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nome       = $_POST['nome'];
    $email      = $_POST['email'];
    $senha      = $_POST['senha'];
    $cpf        = $_POST['cpf'];
    $data_nasc  = $_POST['data_nascimento'];

    $telefone   = $_POST['telefone'];
    $tipo       = $_POST['tipo'];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);


    $sql_Clientes = $conn->prepare("
        INSERT INTO clientes (nome, email, senha, cpf, data_nascimento)
        VALUES (?, ?, ?, ?, ?)
    ");
    $sql_Clientes->bind_param("sssss", $nome, $email, $senhaHash, $cpf, $data_nasc);

    if ($sql_Clientes->execute()) {

        $id_cliente = $conn->insert_id;

        $sql_tel = $conn->prepare("
            INSERT INTO telefones (id_cliente, numero, tipo)
            VALUES (?, ?, ?)
        ");
        $sql_tel->bind_param("iss", $id_cliente, $telefone, $tipo);
        $sql_tel->execute();

        echo "<script>alert('Cadastro realizado com sucesso!'); window.location='login.php';</script>";

    } else {
        echo "❌ ERRO ao cadastrar cliente: " . $conn->error;
    }

    $sql_Clientes->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <form method="POST">

<input type="text"   name="nome" placeholder="Nome" required><br><br>
<input type="email"  name="email" placeholder="E-mail" required><br><br>
<input type="password" name="senha" placeholder="Senha" required><br><br>
<input type="text"   name="cpf" placeholder="CPF" required><br><br>
<input type="date"   name="data_nascimento" required><br><br>

<input type="text"   name="telefone" placeholder="Telefone" required><br><br>

<select name="tipo">
   <option value="celular">Celular</option>
   <option value="residencial">Residencial</option>
   <option value="comercial">Comercial</option>
</select><br><br>

<button type="submit">Cadastrar</button>
<button type="reset">Limpar</button>
<button type="button" onclick="window.location.href='index.php'">Voltar</button>
</form>

</body>
</html>