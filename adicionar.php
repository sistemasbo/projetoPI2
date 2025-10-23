<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Presença</title>
</head>
<body>
<h2>Registrar Nova Presença</h2>
<form action="inserir.php" method="POST">
    <label>Atividade:</label><br>
    <input type="text" name="PRE_ATIVIDADE" required><br><br>

    <label>Data:</label><br>
    <input type="date" name="PRE_DATA" required><br><br>

    <label>Hora:</label><br>
    <input type="time" name="PRE_HORA" required><br><br>

    <label>Responsável:</label><br>
    <input type="text" name="PRE_RESP" required><br><br>

    <label>Educação:</label><br>
    <input type="text" name="PRE_EDUCA"><br><br>

    <label>Prontuário:</label><br>
    <input type="text" name="PRE_PRONT"><br><br>

    <label>Assinatura:</label><br>
    <input type="text" name="PRE_ASSINA"><br><br>

    <label>Inclusão:</label><br>
    <input type="datetime-local" name="PRE_INC"><br><br>

    <button type="submit">Salvar</button>
</form>
<br>
<a href="index.php">Voltar</a>
</body>
</html>
