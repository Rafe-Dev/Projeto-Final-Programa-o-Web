<?php
include_once 'topo.php';
require 'config.inc.php';

$sql = $pdo->prepare("SELECT id, nome, email, senha FROM login");
$sql->execute();
$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Administração - Usuários</title>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}
th, td {
    border: 1px solid #333;
    padding: 8px;
}
th {
    background: #ddd;
}
a {
    text-decoration: none;
    padding: 5px 10px;
    background: #444;
    color: white;
    border-radius: 5px;
}
.excluir {
    background: red;
}
</style>
</head>
<body>

<h2>Lista de Usuários Cadastrados</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Senha</th>
    <th>Ações</th>
</tr>

<?php foreach ($usuarios as $user): ?>
<tr>
    <td><?= $user['id'] ?></td>
    <td><?= $user['nome'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['senha'] ?></td>
    <td>
        <a href="editar_usuario.php?id=<?= $user['id'] ?>">Editar</a>
        <a class="excluir" href="excluir_usuario.php?id=<?= $user['id'] ?>" 
           onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
           Excluir
        </a>
    </td>
</tr>
<?php endforeach; ?>

</table>

</body>
</html>