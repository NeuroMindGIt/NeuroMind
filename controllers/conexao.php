<?php

//CONEXÃO COM BD, POR FAVOR NÃO MUDAR SEM AVISAR PARA NÃO DERRUBR SITE - VW

$servidor = "localhost";
$usuario = "root";
$senha = "usbw";
$banco = "neuromind";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica se houve erro na conexão - VW
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>