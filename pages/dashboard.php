<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado -VW
if (!isset($_SESSION['usuario_logado'])) {
    // Caso não esteja logado, redireciona para a página de login
    header("Location: ../index.php");
    exit();
}

// Se estiver logado, exibe o dashboard - VW
echo "Bem-vindo, " . $_SESSION['nome'] . "!"; // Exibe o nome do usuário logado
?>

<!-- Conteúdo da página do dashboard -->

<a href="./controllers/logout.php" class="btn btn-danger">Sair</a>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="assets/icons/logo.png">
    <title>Dashboard</title>
</head>
<body>

<?php include 'includes/menu-nav.php';  // include menu de navegação - VW ?> 
</body>
</html>
