<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "DELETE FROM TAB_PRESENCA WHERE PRE_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao excluir: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
