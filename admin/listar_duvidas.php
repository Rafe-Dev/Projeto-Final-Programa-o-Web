<?php
include('config.inc.php');

$sql = "SELECT * FROM duvidas ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$duvidas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Dúvidas</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background: #222;
            color: #fff;
        }
        a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 5px;
            color: white;
        }
        .excluir { background: red; }
        .editar { background: green; }
    </style>
</head>
<body>

<h2>Lista de Dúvidas Recebidas</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Mensagem</th>
        <th>Data</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($duvidas as $linha) { ?>
        <tr>
            <td><?= $linha['id'] ?></td>
            <td><?= $linha['nome'] ?></td>
            <td><?= $linha['numero'] ?></td>
            <td><?= $linha['mensagem'] ?></td>
            <td><?= $linha['data_envio'] ?></td>
            <td>
                <a class="editar" href="editar_duvida.php?id=<?= $linha['id'] ?>">Editar</a>

                <a class="excluir"
                   href="excluir_duvida.php?id=<?= $linha['id'] ?>"
                   onclick="return confirm('Deseja excluir esta dúvida?')">
                   Excluir
                </a>
            </td>
        </tr>
    <?php } ?>

</table>

</body>
</html>