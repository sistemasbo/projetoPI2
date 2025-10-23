<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Presenças</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: blue; }
        .btn { background-color: #28a745; color: white; padding: 8px 12px; border-radius: 4px; }
        .btn-danger { background-color: #dc3545; }
    </style>
</head>
<body>

<h2>Lista de Presenças</h2>
<a class="btn" href="adicionar.php">+ Nova Presença</a>

<table>
    <tr>
        <th>ID</th>
        <th>Atividade</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Responsável</th>
        <th>Ações</th>
    </tr>
    <?php
    $sql = "SELECT * FROM TAB_PRESENCA ORDER BY PRE_ID DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['PRE_ID'] . "</td>";
            echo "<td>" . $row['PRE_ATIVIDADE'] . "</td>";
            echo "<td>" . $row['PRE_DATA'] . "</td>";
            echo "<td>" . $row['PRE_HORA'] . "</td>";
            echo "<td>" . $row['PRE_RESP'] . "</td>";
            echo "<td>
                    <a href='editar.php?id=" . $row['PRE_ID'] . "'>✏️ Editar</a> |
                    <a href='deletar.php?id=" . $row['PRE_ID'] . "' onclick='return confirm(\"Deseja excluir este registro?\")'>🗑️ Excluir</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Nenhum registro encontrado.</td></tr>";
    }

    $conn->close();
    ?>
</table>
</body>
</html>
