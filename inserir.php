<?php
include("conexao.php");

$PRE_ATIVIDADE = $_POST['PRE_ATIVIDADE'];
$PRE_DATA      = $_POST['PRE_DATA'];
$PRE_HORA      = $_POST['PRE_HORA'];
$PRE_RESP      = $_POST['PRE_RESP'];
$PRE_EDUCA     = $_POST['PRE_EDUCA'];
$PRE_PRONT     = $_POST['PRE_PRONT'];
$PRE_ASSINA    = $_POST['PRE_ASSINA'];
$PRE_INC       = $_POST['PRE_INC'];

$sql = "INSERT INTO TAB_PRESENCA 
        (PRE_ATIVIDADE, PRE_DATA, PRE_HORA, PRE_RESP, PRE_EDUCA, PRE_PRONT, PRE_ASSINA, PRE_INC)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss",
    $PRE_ATIVIDADE, $PRE_DATA, $PRE_HORA, $PRE_RESP,
    $PRE_EDUCA, $PRE_PRONT, $PRE_ASSINA, $PRE_INC
);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao inserir: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
