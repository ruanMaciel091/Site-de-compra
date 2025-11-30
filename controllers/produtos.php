<?php
include "../config/config.php";
include("admin_auth.php");



$result = $conn->query("SELECT * FROM produtos ORDER BY id_produto DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
<h2>Lista de Produtos</h2>
<a href="addProdutos.php">➕ Cadastrar Novo Produto</a><br><br>

<table border="1" cellpadding="6">
<tr>
<th>ID</th><th>Nome</th><th>Preço</th><th>Estoque</th><th>Categoria</th><th>Ativo</th><th>Ações</th>
</tr>

<?php while($p = $result->fetch_assoc()): ?>
<tr>
  <td><?= $p["id_produto"] ?></td>
  <td><?= $p["nome"] ?></td>
  <td>R$ <?= number_format($p["preco"],2,",",".") ?></td>
  <td><?= $p["estoque"] ?></td>
  <td><?= $p["categoria"] ?></td>
  <td><?= $p["ativo"] ? "Sim" : "Não" ?></td>
  <td>
     <a href="editProdutos.php?id=<?= $p["id_produto"] ?>">✏ Editar</a> |
     <a href="delete.php?id=<?= $p["id_produto"] ?>" onclick="return confirm('Excluir produto?')">🗑 Excluir</a>
  </td>
</tr>
<?php endwhile; ?>
</table>

<br><a href="../views/home.php">⬅ Sair</a>
</body>
</html>
