<?php
// Configurações do banco de dados
$servername = "projeto_pi2025.mysql.dbaas.com.br"; // Geralmente 'localhost'
$username = "projeto_pi2025"; // O seu usuário do MySQL
$password = "nVNWhJG3XA@25"; // A sua senha do MySQL
$dbname = "TAB_USU"; // O nome do banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara e executa a query de inserção
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "INSERT INTO tab_usu (usu_senha, usu_email) VALUES ('$nome', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Novo registro criado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fecha a conexão
$conn->close();
?>