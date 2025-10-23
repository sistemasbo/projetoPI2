<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Página Restrita</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome_usuario']); ?>!</h2>
    <p>Você está logado e pode ver este conteúdo.</p>
    <a href="logout.php">Sair</a>
</body>
</html>