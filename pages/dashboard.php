<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado -VW
if (!isset($_SESSION['usuario_logado'])) {
    // Caso não esteja logado, redireciona para a página de login
    header("Location: ../index.php");
    exit();
}

?>

<!-- Conteúdo da página do dashboard -->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="assets/icons/logo.png">
    <title>Dashboard</title>
</head>
<body class="bodydashboard">


<?php include 'includes/menu-nav.php';  // include menu de navegação - VW ?>

 <?php include './includes/footer.php'; ?> 

</body>
</html>
