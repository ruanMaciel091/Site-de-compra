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

    $cep          = $_POST['cep'];
    $rua          = $_POST['rua'];
    $numero_endereco = $_POST['numero'];
    $bairro       = $_POST['bairro'];
    $cidade       = $_POST['cidade'];
    $estado       = $_POST['estado'];
    $complemento  = $_POST['complemento'];

   
    $sql_Clientes = $conn->prepare("
        INSERT INTO clientes (nome, email, senha, cpf, data_nascimento)
        VALUES (?, ?, ?, ?, ?)
    ");
    $sql_Clientes->bind_param("sssss", $nome, $email, $senhaHash, $cpf, $data_nasc);

    if ($sql_Clientes->execute()) {

        
        $id_cliente = $conn->insert_id;

        $sql_Enderecos = $conn->prepare("
            INSERT INTO enderecos (id_cliente, cep, rua, numero, bairro, cidade, estado, complemento)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $sql_Enderecos->bind_param("isssssss", 
            $id_cliente, $cep, $rua, $numero_endereco, $bairro, $cidade, $estado, $complemento
        );
        $sql_Enderecos->execute();

        
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/scriptCep.js"></script>
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

<div>
     <h3>Endereço</h3>
        <label>CEP:</label> <input type="text" name="cep" id="cep" required>
        <input id="buscar" type="button" value="Buscar" onclick="BuscarCep()" ><br>

        <label>Rua:</label> <input type="text" name="rua" id="rua" required><br>
            
        <label>Número:</label> <input type="text" name="numero" required><br>
           
        <label>Bairro:</label> <input type="text" name="bairro" id="bairro" required><br>
            
        <label>Cidade:</label> <input type="text" name="cidade" id="cidade" required><br>
            
        <label>Estado:</label> <input type="text" name="estado" id="estado" maxlength="2" required><br>
            
        <label>Complemento:</label> <input type="text" name="complemento"><br>
</div><br>

<button type="submit">Cadastrar</button>
<button type="reset">Limpar Tudo</button>
<button type="button" onclick="window.location.href='../views/home.php'">Voltar</button>
</form>

</body>
</html>