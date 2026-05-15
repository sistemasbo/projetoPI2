<?php
require_once 'connectbd.php';

try {
    $matriculas = $pdo->query("SELECT * FROM TAB_MATRICULA")->fetchAll(PDO::FETCH_ASSOC);
    $presencas = $pdo->query("SELECT p.*, m.MAT_NOME FROM TAB_PRESENCA p LEFT JOIN TAB_MATRICULA m ON p.PRE_PRONT = m.MAT_ID ORDER BY p.PRE_DATA DESC")->fetchAll(PDO::FETCH_ASSOC);
    $evolucoes = $pdo->query("SELECT e.*, m.MAT_NOME FROM TAB_EVOLUCAO e LEFT JOIN TAB_MATRICULA m ON e.EVO_PRONT = m.MAT_ID ORDER BY e.EVO_DATA DESC")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualização de Dados - Projeto PI 2025</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; margin: 20px; color: #333; }
        .container { max-width: 1200px; margin: auto; background: white; padding: 20px; border-radius: 8px; shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; text-align: center; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        h2 { background: #3498db; color: white; padding: 10px; border-radius: 4px; margin-top: 30px; }
        .table-responsive { overflow-x: auto; margin-top: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 0.9em; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #ecf0f1; font-weight: bold; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        tr:hover { background-color: #f1f1f1; }
        .badge { padding: 4px 8px; border-radius: 12px; font-size: 0.8em; color: white; }
        .bg-fem { background: #e91e63; }
        .bg-masc { background: #2196f3; }
    </style>
</head>
<body>

<div class="container">
    <h1>Painel de Dados - PI 2025</h1>

    <h2>Pacientes Matriculados</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Prontuário</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>CPF</th>
                    <th>Data Matrícula</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($matriculas as $m): ?>
                <tr>
                    <td><strong><?php echo $m['MAT_ID']; ?></strong></td>
                    <td><?php echo $m['MAT_NOME']; ?></td>
                    <td>
                        <span class="badge <?php echo ($m['MAT_SEXO'] == 'FEM') ? 'bg-fem' : 'bg-masc'; ?>">
                            <?php echo $m['MAT_SEXO']; ?>
                        </span>
                    </td>
                    <td><?php echo $m['MAT_IDADE']; ?> anos</td>
                    <td><?php echo $m['MAT_CPF']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($m['MAT_DATA_MAT'])); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>Registros de Presença</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Paciente</th>
                    <th>Atividade</th>
                    <th>Responsável</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($presencas as $p): ?>
                <tr>
                    <td><?php echo date('d/m/Y', strtotime($p['PRE_DATA'])); ?></td>
                    <td><?php echo $p['MAT_NOME'] ?? 'Não identificado'; ?> (ID: <?php echo $p['PRE_PRONT']; ?>)</td>
                    <td><?php echo $p['PRE_ATIVIDADE']; ?></td>
                    <td><?php echo $p['PRE_RESP']; ?></td>
                    <td><?php echo $p['PRE_HORA']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h2>Evoluções Clínicas</h2>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Paciente</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evolucoes as $e): ?>
                <tr>
                    <td><?php echo ($e['EVO_DATA'] != '0000-00-00') ? date('d/m/Y', strtotime($e['EVO_DATA'])) : 'N/A'; ?></td>
                    <td><?php echo $e['MAT_NOME'] ?? 'N/A'; ?></td>
                    <td><?php echo $e['EVO_OBS']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>