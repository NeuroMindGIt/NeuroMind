<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="assets/icons/logo.png">
    <title>Cadastro CareConnect</title>
</head>
<body class="bodycadastro">
    <main class="maincadastro">
    <img src="assets/icons/logo.png" class="logo-cadastro">
    <h4>Seja bem-vindo ao NeuroMind!</h4>
    <br>
    <h5>CADASTRE-SE</h5>
    <br>
    <form action="cadastro.php" method="post">
    <label>Nome</label>
    <br>
    <input type="text" placeholder="Digite seu nome:" id="nome-user" class="input-cadastro">
    <br><br>
    <label>Email</label>
    <br>
    <input type="email" placeholder="Digite seu email:" id="email-user" class="input-cadastro">
    <br><br>
    <label>Senha</label>
    <br>
    <input type="password" placeholder="Digite sua senha:" id="senha-user" class="input-cadastro">
    <p>Já possui uma conta? <a href="pages/login.php">Clique aqui!</a></p>
    <br>
    <button class="submit-cad" id="submit-cad">Cadastar</button>
    
    <?php 
        include './includes/footer.php';
    ?>
</main>
</form>
</body>
</html>