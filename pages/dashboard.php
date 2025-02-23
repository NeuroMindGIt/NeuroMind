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
