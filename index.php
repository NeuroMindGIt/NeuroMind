<?php

// Inicia a sessão
session_start();

// Verifica se o usuário já está logado -VW
if (isset($_SESSION['usuario_logado'])) {
    // Se estiver logado, redireciona para o dashboard - VW
    include './pages/dashboard.php';  // include da página de cadastro, favor não mexer -VW
    exit();  
} else {
    include './pages/cadastro.php';  // include da página de cadastro, favor não mexer -VW
}

?>
