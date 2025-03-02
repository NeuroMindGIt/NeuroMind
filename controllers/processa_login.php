<?php

// FORMULÁRIO QUE PROCESSA O LOGIN DE USUÁRIO, TOMEM CUIDADO NO QUE FOREM MEXER! - VW

// Inicia a sessão
session_start();

// Inclui a conexão com o banco de dados
include './conexao.php';  // Certifique-se que o caminho está correto

// Ativa a exibição de erros (apenas para desenvolvimento)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se o formulário foi submetido via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe e limpa os dados do formulário
    $email = trim($_POST["email"]);
    $senha = $_POST["senha"];

    // Validação básica
    if (empty($email) || empty($senha)) {
        $_SESSION['erro'] = "E-mail e senha são obrigatórios.";
        header("Location: ../index.php");
        exit();
    }

    // Consulta para buscar o usuário com o e-mail informado
    $sql = "SELECT id, nome, senha, Nikname_Usuario, email,Nr_Telefone,Bios_Usuario FROM tb_cadastro WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    if (!$stmt) {
        $_SESSION['erro'] = "Erro no SQL: " . $conexao->error;
        header("Location: ../index.php");
        exit();
    }
    $stmt->bind_param("s", $email);
    
    if ($stmt->execute()) {
        // Guarda o resultado
        $stmt->store_result();
        
        // Verifica se o usuário foi encontrado
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $nome, $senha_hash, $nickname, $email, $Nr_Telefone, $Bios_Usuario);
            $stmt->fetch();
            
            // Verifica a senha utilizando password_verify()
            if (password_verify($senha, $senha_hash)) {
                // Dados corretos: cria as variáveis de sessão e redireciona para o dashboard
                $_SESSION['usuario_logado'] = $id;
                $_SESSION['nome'] = $nome;
                $_SESSION['nickname'] = $nickname;  // Armazenar o nickname na sessão
                $_SESSION['email'] = $email;  
                $_SESSION['Nr_Telefone'] = $Nr_Telefone; 
                $_SESSION{'Bios_Usuario'} = $Bios_Usuario;
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION['erro'] = "E-mail ou senha incorretos.";
                header("Location: ../index.php");
                exit();
            }
        } else {
            $_SESSION['erro'] = "E-mail ou senha incorretos.";
            header("Location: ../index.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "Erro ao executar consulta.";
        header("Location: ../index.php");
        exit();
    }
    
    $stmt->close();
    $conexao->close();
} else {
    // Se o acesso não foi via POST, redireciona para o formulário
    header("Location: ../index.php");
    exit();
}
?>
