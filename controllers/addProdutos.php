<?php
include "../config/config.php";
include("admin_auth.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = $conn->prepare("
        INSERT INTO produtos (nome, descricao, preco, estoque, categoria, ativo)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $sql->bind_param(
        "ssdiss",
        $_POST["nome"],
        $_POST["descricao"],
        $_POST["preco"],
        $_POST["estoque"],
        $_POST["categoria"],
        $_POST["ativo"]
    );

    if ($sql->execute()) {
        echo "<script>alert('Produto cadastrado!'); location='index.php';</script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    </html>
    <h2>Cadastrar Produto</h2>
    <form method="POST">
    
    Nome:<br>
    <input type="text" name="nome" required><br><br>
    
    Descrição:<br>
    <textarea name="descricao"></textarea><br><br>
    
    Preço:<br>
    <input type="number" step="0.01" name="preco" required><br><br>
    
    Estoque:<br>
    <input type="number" name="estoque" value="0"><br><br>
    
    Categoria:<br>
    <input type="text" name="categoria"><br><br>
    
    Ativo:<br>
    <select name="ativo">
      <option value="1">Sim</option>
      <option value="0">Não</option>
    </select><br><br>
    
    <button type="submit">Salvar</button>
    </form>
    <br><a href="produtos.php">⬅ Voltar</a>
</body>
