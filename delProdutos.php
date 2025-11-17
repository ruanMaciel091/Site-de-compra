<?php
include "config.php";

$id = $_GET["id"];

$conn->query("DELETE FROM produtos WHERE id_produto = $id");

echo "<script>alert('Produto removido!'); location='index.php';</script>";
?>