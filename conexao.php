<?php
$servername = "projeto_pi2025.mysql.dbaas.com.br";
$username   = "projeto_pi2025";
$password   = "nVNWhJG3XA@25";
$dbname     = "projeto_pi2025";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
