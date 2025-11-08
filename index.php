
<?php include 'config.php'; 
session_start();
if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
    echo "Bem-vindo, " . $_SESSION['nome'] . "!";
} else {
    echo "Você não está logado. Por favor, faça o login.";
}
?>
