<?php
session_start(); // Inicia a sessão para armazenar informações do usuário

// 1. Configurações do Banco de Dados
$servername = "projeto_pi2025.mysql.dbaas.com.br";
$username = "projeto_pi2025"; // Altere para seu usuário do MySQL
$password = "nVNWhJG3XA@25";   // Altere para sua senha do MySQL
$dbname = "projeto_pi2025"; // Altere para o nome do seu banco de dados

// 2. Conexão com o MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// 3. Receber os dados do formulário
$nome_usuario = $_POST['nome_usuario'];
$senha_digitada = $_POST['senha'];

// 4. Preparar e executar a consulta para buscar o usuário
$stmt = $conn->prepare("SELECT id, nome_usuario, senha FROM TAB_USU WHERE nome_usuario = ?");
$stmt->bind_param("s", $nome_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // 5. Usuário encontrado, agora verifica a senha
    $row = $result->fetch_assoc();
    $senha_hash_banco = $row['senha'];

    if (password_verify($senha_digitada, $senha_hash_banco)) {
        // 6. Senha correta, login bem-sucedido
        $_SESSION['loggedin'] = true;
        $_SESSION['nome_usuario'] = $nome_usuario;
        echo "Login bem-sucedido! Bem-vindo, " . htmlspecialchars($nome_usuario) . ".";
        // Redireciona o usuário para uma página restrita, por exemplo:
        // header("Location: pagina_restrita.php");
        // exit;
    } else {
        // 7. Senha incorreta
        echo "Usuário ou senha incorretos.";
    }
} else {
    // 8. Usuário não encontrado
    echo "Usuário ou senha incorretos.";
}

$stmt->close();
$conn->close();
?>
