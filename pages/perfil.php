<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado -VW
if (!isset($_SESSION['usuario_logado'])) {
    // Caso não esteja logado, redireciona para a página de login
    header("Location: ../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" href="assets/icons/logo.png">
    <title>Perfil</title>
</head>
<body class="bodyperfil">

    <img src="../assets/icons/logo.png">
    <br>
   <h1> <?php echo $_SESSION['nome']; // Exibe o nome do usuário logado ?></h1>
   <p>@<?php echo $_SESSION['nickname']; // Exibe o nome do usuário logado ?></p>
    <br>
    <label>Email</label>
    <div class="perfilcontatos">
    <h3><?php echo $_SESSION['email']; // Exibe o nome do usuário logado ?></h3>
    </div>
    <br>
    <label>Telefone</label>
    <div class="perfilcontatos">
    <h3><?php echo $_SESSION['telefone']; // Exibe o nome do usuário logado ?></h3>
    </div>
    <br>
    <label>Bio</label>
    <div class="perfilcontatos">
    <h3><?php echo $_SESSION['bio']; // Exibe o nome do usuário logado ?></h3>
    </div>
    <br>
    <a href="../controllers/logout.php" class="btn btn-danger">Sair da conta</a>
</body>

</html>