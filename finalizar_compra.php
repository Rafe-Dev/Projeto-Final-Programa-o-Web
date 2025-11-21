<?php
// finalizar_compra.php
session_start();
require_once "conexao.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
$usuario_id = (int) $_SESSION['usuario_id'];

// Calcula total e busca itens do carrinho
$sql = "SELECT c.produto_id, c.quantidade, p.preco AS preco_produto
        FROM carrinho c
        JOIN produtos p ON p.id = c.produto_id
        WHERE c.usuario_id = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $usuario_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$itens = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_stmt_close($stmt);

if (count($itens) === 0) {
    // nada a fazer
    header("Location: carrinho.php");
    exit;
}

$total = 0;
foreach ($itens as $it) {
    $total += (float)$it['preco_produto'] * (int)$it['quantidade'];
}

// Inicia transação
mysqli_begin_transaction($conexao);

try {
    // 1) inserir pedido
    $ins = "INSERT INTO pedidos (usuario_id, total) VALUES (?, ?)";
    $s1 = mysqli_prepare($conexao, $ins);
    mysqli_stmt_bind_param($s1, "id", $usuario_id, $total);
    mysqli_stmt_execute($s1);
    $pedido_id = mysqli_insert_id($conexao);
    mysqli_stmt_close($s1);

    // 2) inserir itens_pedido
    $insItem = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco_unitario) VALUES (?, ?, ?, ?)";
    $s2 = mysqli_prepare($conexao, $insItem);
    foreach ($itens as $it) {
        $produto_id = (int)$it['produto_id'];
        $qtd = (int)$it['quantidade'];
        $preco_unit = (float)$it['preco_produto'];
        mysqli_stmt_bind_param($s2, "iiid", $pedido_id, $produto_id, $qtd, $preco_unit);
        mysqli_stmt_execute($s2);
    }
    mysqli_stmt_close($s2);

    // 3) limpar carrinho do usuário
    $del = "DELETE FROM carrinho WHERE usuario_id = ?";
    $s3 = mysqli_prepare($conexao, $del);
    mysqli_stmt_bind_param($s3, "i", $usuario_id);
    mysqli_stmt_execute($s3);
    mysqli_stmt_close($s3);

    mysqli_commit($conexao);

    // redireciona para página de confirmação
    header("Location: confirmacao_pedido.php?pedido_id=" . $pedido_id);
    exit;

} catch (Exception $e) {
    mysqli_rollback($conexao);
    // opcional: log do erro
    error_log("Erro ao finalizar compra: " . $e->getMessage());
    echo "Ocorreu um erro ao processar seu pedido. Tente novamente.";
    exit;
}