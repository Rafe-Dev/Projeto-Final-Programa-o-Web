<?php
include_once "topo.php";
include "config.inc.php";

$host = 'mysql:host=localhost;dbname=projeto1;charset=utf8';
$user = 'root';
$pass = ''; 

try {
    $pdo = new PDO($host, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, nome, email, avaliacao FROM avaliacoes ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erro ao buscar avaliações: " . $e->getMessage();
    $avaliacoes = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Avaliações | Administração</title>
    <style>
        /* ... (Seu CSS permanece o mesmo) ... */
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; color: #333; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .avaliacao-cell { max-width: 400px; white-space: pre-wrap; word-wrap: break-word; }
        .acoes-btn { 
            text-decoration: none; 
            padding: 5px 10px; 
            margin: 0 5px;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .editar { background-color: #ffc107; color: #333; }
        .excluir { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

    <h2>📝 Avaliações Recebidas</h2>
    
    <?php if (count($avaliacoes) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Avaliação</th>
                    <th>Ações</th> </tr>
            </thead>
            <tbody>
                <?php foreach ($avaliacoes as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="avaliacao-cell"><?php echo nl2br(htmlspecialchars($row['avaliacao'])); ?></td>
                        
                        <td>
                            <a href="editar_avaliacao.php?id=<?php echo $row['id']; ?>" class="acoes-btn editar">Editar</a>
                            <a href="excluir_avaliacao.php?id=<?php echo $row['id']; ?>" class="acoes-btn excluir" onclick="return confirm('Tem certeza que deseja excluir esta avaliação?');">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhuma avaliação encontrada.</p>
    <?php endif; ?>

</body>
</html>