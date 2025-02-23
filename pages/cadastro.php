<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="assets/icons/logo.png">
    <title>Cadastro CareConnect</title>
</head>
</main>
<body class="bodycadastro">
    <main class="maincadastro" id="maincadastro">
    <img src="assets/icons/logo.png" class="logo-cadastro">
    <h4>Seja bem-vindo ao NeuroMind!</h4>
    <br>
    <h5>CADASTRE-SE</h5>
    <br>
    <form action="controllers/processa_cadastro.php" method="POST">
    <label>Nome</label>
    <br>
    <input type="text" placeholder="Digite seu nome:" name="nome" id="nome" class="input-cadastro" required>
    <br><br>
    <label>Email</label>
    <br>
    <input type="email" placeholder="Digite seu email:" name="email" id="email" class="input-cadastro" required>
    <br><br>
    <label>Senha</label>
    <br>
    <input type="password" placeholder="Digite sua senha:" name="senha" id="senha" class="input-cadastro" required>
    <br><br>
    <label>Confirme sua Senha</label>
    <br>
    <input type="password" placeholder="Confirme sua senha:" name="confirma_senha"  id="confima_senha" class="input-cadastro" required>
    <p>Já possui uma conta? <a onclick="login()">Faça login!</a></p>
    <p>Ao se cadastrar você aceita os <a href="termos-uso/termos.php"> Termos de uso e condições!</a></p>
    <br>    
    <button type="submit" class="submit-cad" id="submit-cad">Cadastrar</button>
    </form>
    <?php 
        include './includes/footer.php';
    ?>
</main>

<body class="bodycadastro">
    <main class="maincadastro" id="mainlogin">
    <img src="assets/icons/logo.png" class="logo-cadastro">
    <h4>Seja bem-vindo de volta ao NeuroMind!</h4>
    <br>
    <h5>Entre em sua conta</h5>
    <br>
    <?php
    if (isset($_SESSION['erro'])) {
        echo '<p style="color: red;">' . $_SESSION['erro'] . '</p>';
        unset($_SESSION['erro']);
    }
    ?>
    <form action="controllers/processa_login.php" method="post">
    <label>Email</label>
    <br>
    <input type="email" placeholder="Digite seu email:"  name="email" id="email" class="input-cadastro" required>
    <br><br>
    <label>Senha</label>
    <br>
    <input type="password" placeholder="Digite sua senha:" name="senha" id="senha" class="input-cadastro" required>
    <p>Ainda não possui uma conta? <a onclick="cadastrar()">Cadastre-se!</a></p>
    <br>
    <button type="submit" class="submit-cad" id="submit-cad">Entrar</button>
    </form>
    <?php 
        include './includes/footer.php';
    ?>
</main>
<script src="js/script.js"></script>
</body>
</html>