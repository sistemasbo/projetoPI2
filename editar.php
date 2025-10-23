<?php
include("conexao.php");
$id = $_GET['id'];
$sql = "SELECT * FROM TAB_PRESENCA WHERE PRE_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$registro = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Presença</title>
</head>
<body>
<h2>Editar Presença</h2>
<form action="atualizar.php" method="POST">
    <input type="hidden" name="PRE_ID" value="<?php echo $registro['PRE_ID']; ?>">

    <label>Atividade:</label><br>
    <input type="text" name="PRE_ATIVIDADE" value="<?php echo $registro['PRE_ATIVIDADE']; ?>" required><br><br>

    <label>Data:</label><br>
    <input type="date" name="PRE_DATA" value="<?php echo $registro['PRE_DATA']; ?>" required><br><br>

    <label>Hora:</label><br>
    <input type="time" name="PRE_HORA" value="<?php echo $registro['PRE_HORA']; ?>" required><br><br>

    <label>Responsável:</label><br>
    <input type="text" name="PRE_RESP" value="<?php echo $registro['PRE_RESP']; ?>" required><br><br>

    <label>Educação:</label><br>
    <input type="text" name="PRE_EDUCA" value="<?php echo $registro['PRE_EDUCA']; ?>"><br><br>

    <label>Prontuário:</label><br>
    <input type="text" name="PRE_PRONT" value="<?php echo $registro['PRE_PRONT']; ?>"><br><br>

    <label>Assinatura:</label><br>
    <input type="text" name="PRE_ASSINA" value="<?php echo $registro['PRE_ASSINA']; ?>"><br><br>

    <label>Inclusão:</label><br>
    <input type="datetime-local" name="PRE_INC" value="<?php echo str_replace(' ', 'T', $registro['PRE_INC']); ?>"><br><br>

    <button type="submit">Atualizar</button>
</form>
<br>
<a href="index.php">Voltar</a>
</body>
</html>
