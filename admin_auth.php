<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION["tipo"] !== "admin") {
    echo "<h2>❌ Acesso negado!</h2>";
    exit;
}
?>
