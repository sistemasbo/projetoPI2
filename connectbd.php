<?php
//configuracao geral
date_default_timezone_set('America/Sao_Paulo');
define('DELETE_MODE', 1); //0 - DELETE DEFAULT, 1-SOFT DELETE

//configuracao do BD
$host    = 'projeto_pi2025.mysql.dbaas.com.br';
$dbname  = 'projeto_pi2025';
$usuario = 'projeto_pi2025';
$senha   = 'nVNWhJG3XA@25';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexão Realizada com Sucesso.";
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}