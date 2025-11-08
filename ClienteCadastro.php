<?php
 include 'config.php';

 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $cpf = $_POST['cpf'];
 $telefone = $_POST['telefone'];
 $data_nascimento = $_POST['data_nascimento'];
 $cep = $_POST['cep'];
 $numero = $_POST['numero'];
 $bairro = $_POST['bairro'];
 $cidade = $_POST['cidade'];
 $estado = $_POST['estado'];
 $rua = $_POST['rua'];
 $senha = $_POST['senha'];
 $confirmar_senha = $_POST['confirmar_senha']; 

if ($senha != $confirmar_senha) {
    die("Erro: As senhas não coincidem. Por favor, volte e tente novamente.");
}

 $sql = "INSERT INTO clientes (nome, email, telefone, data_nascimento, cep, rua, numero, bairro, cidade, estado, senha, cpf) 
 VALUES ('$nome', '$email', '$telefone', '$data_nascimento', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado', '$senha', '$cpf')";

 if (mysqli_query($conn, $sql)) {
     echo "Novo registro criado com sucesso";
     header("Location: index.php");
 } else {
    header("Location: ClienteCadastro.html");
     echo "Erro: " .mysqli_connect_errno($conn);
 }

 mysqli_close($conn);
?>