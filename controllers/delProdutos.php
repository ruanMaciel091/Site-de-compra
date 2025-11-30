<?php
include "../config/config.php";
include("admin_auth.php");

$id = $_GET["id"];

$conn->query("DELETE FROM produtos WHERE id_produto = $id");

echo "<script>alert('Produto removido!'); location='produtos.php';</script>";
?>