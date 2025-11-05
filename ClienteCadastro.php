<?php
 include 'config.php';

 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone'];
 $data_nascimento = $_POST['data_nascimento'];
 $cep = $_POST['cep'];
 $rua = $_POST['rua'];
 $numero = $_POST['numero'];
 $bairro = $_POST['bairro'];
 $cidade = $_POST['cidade'];
 $estado = $_POST['estado'];

 $sql = "INSERT INTO clientes (nome, email, telefone, data_nascimento, cep, rua, numero, bairro, cidade, estado) 
 VALUES ('$nome', '$email', '$telefone', '$data_nascimento', '$cep', '$rua', '$numero', '$bairro', '$cidade', '$estado')";

 if (mysqli_query($conn, $sql)) {
     echo "Novo registro criado com sucesso";
 } else {
     echo "Erro: " .mysqli_connect_errno($conn);
 }

 mysqli_close($conn);
?>