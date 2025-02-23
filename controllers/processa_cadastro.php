<<?php

// FORMULARIO QUE PROCESSA CADASTRO DE USUARIO, TOMEM CUIDADO NO QUE FOREM MECHER! - VW

// Inicia a sessão - VW
session_start();

// Incluindo a conexão com o banco de dados - VW
include './conexao.php';

// Reporta erros no código caso haja algum - VW
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se os dados foram enviados pelo formulário - VW
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Limpeza e captura dos dados - VW
    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];
    $confirma_senha = $_POST["confirma_senha"];

    // Validação básica - VW
    if (empty($nome) || empty($email) || empty($senha) || empty($confirma_senha)) {
        $_SESSION['erro'] = "Todos os campos são obrigatórios.";
        header("Location: ../index.php");
        exit();
    }

    if ($senha !== $confirma_senha) {
        $_SESSION['erro'] = "As senhas não coincidem.";
        header("Location: ../index.php");
        exit();
    }
    
    // Verifica se a senha possui no mínimo 8 caracteres - VW
    if (strlen($senha) < 8) {
        $_SESSION['erro'] = "A senha deve ter no mínimo 8 caracteres.";
        header("Location: ../index.php");
        exit();
    }

    // Validação do formato do e-mail - VW
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erro'] = "E-mail inválido.";
        header("Location: ../index.php");
        exit();
    }

    // Verificar se o e-mail já está registrado no banco -VW
    $sql_check_email = "SELECT COUNT(*) FROM tb_cadastro WHERE email = ?";
    $stmt_check_email = $conexao->prepare($sql_check_email);
    $stmt_check_email->bind_param("s", $email);
    
    if ($stmt_check_email->execute()) {
        $stmt_check_email->bind_result($count);
        $stmt_check_email->fetch();
        
        if ($count > 0) {
            $_SESSION['erro'] = "E-mail já cadastrado.";
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "Erro ao verificar e-mail. Tente novamente.";
        header("Location: ../index.php");
        exit();
    }

    // Feche a declaração de verificação de e-mail - VW
    $stmt_check_email->close();

    // Criptografa a senha - VW
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
 
    // Inserir no banco de dados -VW
    $sql = "INSERT INTO tb_cadastro (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha_hash);

    if ($stmt->execute()) {
        $_SESSION['usuario_logado'] = $stmt->insert_id; // Armazena o ID do usuário logado - VW
        $_SESSION['nome'] = $nome;
        header("Location: ../index.php"); // Redireciona para a página do dashboard - VW
        exit(); 
    } else {
        $_SESSION['erro'] = "Erro no cadastro: " . $stmt->error;
        $stmt->close();  // Feche a declaração após a execução -VW 
        header("Location: ../index.php");
        exit();
    }

    $stmt->close();
    $conexao->close();
} else {
    $_SESSION['erro'] = "Acesso inválido.";
    header("Location: ../index.php");
    exit();
}
?>
