<?php
require 'config.inc.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID do usuário não informado.");
}

$sql = $pdo->prepare("SELECT * FROM login WHERE id = ?");
$sql->execute([$id]);
$usuario = $sql->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    die("Usuário não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Usuário</title>
</head>
<body>

<h2>Editar Usuário</h2>

<form action="atualizar_usuario.php" method="POST">

    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

    <p>
        Nome:<br>
        <input type="text" name="nome" 
               value="<?= htmlspecialchars($usuario['nome'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </p>

    <p>
        Email:<br>
        <input type="email" name="email" 
               value="<?= htmlspecialchars($usuario['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </p>

    <p>
        Senha:<br>
        <input type="text" name="senha" 
               value="<?= htmlspecialchars($usuario['senha'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
    </p>

    <button type="submit">Atualizar</button>

</form>

</body>
</html>