<?php
include('config.inc.php');

$id = $_GET['id'];

$sql = "SELECT * FROM avaliacoes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

$duvida = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Avaliações</title>
</head>
<body>

<h2>Editar Avaliação</h2>

<form action="atualizar_avaliacao.php" method="POST">

    <input type="hidden" name="id" value="<?= $duvida['id'] ?>">

    <label>Nome:</label><br>
    <input type="text" name="nome" value="<?= $duvida['nome'] ?>" required><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="email" value="<?= $duvida['email'] ?>" required><br><br>

    <label>Mensagem:</label><br>
    <textarea name="avaliacao" rows="5" required><?= $duvida['avaliacao'] ?></textarea><br><br>

    <button type="submit">Atualizar</button>
</form>

</body>
</html>