<?php
session_start();

if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: home.php");
    exit();
}
?>
