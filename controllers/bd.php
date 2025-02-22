<?php
// Definindo as configurações de conexão com bd, por favor não mecher - VW
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "neuromind"; 

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>