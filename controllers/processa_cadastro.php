<?php

// FORMULARIO QUE PROCESSA CADASTRO DE USUARIO, TOMEM CUIDADO NO QUE FOREM MEXER! - VW

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

    // Verificar se o e-mail já está registrado no banco - VW
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

    // Função para gerar um nickname único - VW
    function gerarNicknameUnico($nome, $conexao) {
        $base_nickname = strtolower(str_replace(' ', '', $nome)); // Remove espaços e coloca em minúsculas
        do {
            $numero_aleatorio = rand(1000, 9999);
            $nickname = $base_nickname . $numero_aleatorio;
            
            // Verifica se o nickname já existe - VW
            $sql_check_nickname = "SELECT COUNT(*) FROM tb_cadastro WHERE Nikname_Usuario = ?";
            $stmt_check_nickname = $conexao->prepare($sql_check_nickname);
            $stmt_check_nickname->bind_param("s", $nickname);
            $stmt_check_nickname->execute();
            $stmt_check_nickname->bind_result($count);
            $stmt_check_nickname->fetch();
            $stmt_check_nickname->close();

        } while ($count > 0); // Repete até encontrar um nickname único

        return $nickname;
    }

    // Gerar nickname único - VW
    $nickname = gerarNicknameUnico($nome, $conexao);

    // Criptografa a senha - VW
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir no banco de dados - VW
    $sql = "INSERT INTO tb_cadastro (nome, email, senha, Nikname_Usuario) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $senha_hash, $nickname);

    if ($stmt->execute()) {
        $_SESSION['usuario_logado'] = $stmt->insert_id; // Armazena o ID do usuário logado - VW
        $_SESSION['nome'] = $nome;
        $_SESSION['nickname'] = $nickname; // Armazena o nickname na sessão - VW
        header("Location: ../index.php"); // Redireciona para a página do dashboard - VW
        exit();
    } else {
        $_SESSION['erro'] = "Erro no cadastro: " . $stmt->error;
        $stmt->close();  // Feche a declaração após a execução - VW 
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
