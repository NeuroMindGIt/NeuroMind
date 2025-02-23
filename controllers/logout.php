<?php
session_start();

// Remove todas as variáveis de sessão
session_unset();

// Destroi a sessão
session_destroy();

// Redireciona para a página inicial (index.php)
header("Location: ../index.php");
exit();
?>
