<?php
include "../config/config.php";
include("admin_auth.php");
$id = $_GET["id"];
$res = $conn->query("SELECT * FROM produtos WHERE id_produto = $id");
$prod = $res->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = $conn->prepare("
        UPDATE produtos
        SET nome=?, descricao=?, preco=?, estoque=?, categoria=?, ativo=?
        WHERE id_produto=?
    ");

    $sql->bind_param(
        "ssdissi",
        $_POST["nome"],
        $_POST["descricao"],
        $_POST["preco"],
        $_POST["esteque"],
        $_POST["categoria"],
        $_POST["ativo"],
        $id
    );

    $sql->execute();

    echo "<script>alert('Produto atualizado!'); location='index.php';</script>";
    exit;
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
    
    <h2>Editar Produto</h2>
    
    <form method="POST">
    Nome:<br>
    <input type="text" name="nome" value="<?= $prod["nome"] ?>" required><br><br>
    
    Descrição:<br>
    <textarea name="descricao"><?= $prod["descricao"] ?></textarea><br><br>
    
    Preço:<br>
    <input type="number" step="0.01" name="preco" value="<?= $prod["preco"] ?>" required><br><br>
    
    Estoque:<br>
    <input type="number" name="estoque" value="<?= $prod["estoque"] ?>"><br><br>
    
    Categoria:<br>
    <input type="text" name="categoria" value="<?= $prod["categoria"] ?>"><br><br>
    
    Ativo:<br>
    <select name="ativo">
      <option value="1" <?= $prod["ativo"] ? "selected" : "" ?>>Sim</option>
      <option value="0" <?= !$prod["ativo"] ? "selected" : "" ?>>Não</option>
    </select><br><br>
    
    <button>Salvar Alterações</button>
    </form>

    <br><a href="produtos.php">⬅ Voltar</a>
</body>
</html>
