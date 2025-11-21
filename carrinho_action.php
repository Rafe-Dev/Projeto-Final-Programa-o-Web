<?php
// carrinho_action.php
session_start();
require_once "conexao.php";

if (!isset($_SESSION['usuario_id'])) {
    // redireciona para login (você pode trocar por modal ou rota)
    header("Location: login.php");
    exit;
}

$usuario_id = (int) $_SESSION['usuario_id'];
$acao = $_GET['acao'] ?? '';
$produto_id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if (!$produto_id) {
    header("Location: carrinho.php");
    exit;
}

if ($acao === 'add') {
    $qtd = isset($_POST['qtd']) ? max(1, (int) $_POST['qtd']) : 1;

    // Verifica se já existe no carrinho
    $sql = "SELECT id, quantidade FROM carrinho WHERE usuario_id = ? AND produto_id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $usuario_id, $produto_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id_exist, $qtd_exist);
    if (mysqli_stmt_fetch($stmt)) {
        mysqli_stmt_close($stmt);
        // atualiza quantidade
        $nova = $qtd_exist + $qtd;
        $sql2 = "UPDATE carrinho SET quantidade = ? WHERE id = ?";
        $stmt2 = mysqli_prepare($conexao, $sql2);
        mysqli_stmt_bind_param($stmt2, "ii", $nova, $id_exist);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
    } else {
        mysqli_stmt_close($stmt);
        // insere novo
        $sql3 = "INSERT INTO carrinho (usuario_id, produto_id, quantidade) VALUES (?, ?, ?)";
        $stmt3 = mysqli_prepare($conexao, $sql3);
        mysqli_stmt_bind_param($stmt3, "iii", $usuario_id, $produto_id, $qtd);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_close($stmt3);
    }

    header("Location: carrinho.php");
    exit;
}

if ($acao === 'remove') {
    $sql = "DELETE FROM carrinho WHERE usuario_id = ? AND produto_id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $usuario_id, $produto_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: carrinho.php");
    exit;
}

if ($acao === 'update') {
    // espera receber POST quantidade (campo name="quantidade[ID]" por exemplo)
    $nova = isset($_POST['qtd']) ? max(1, (int) $_POST['qtd']) : 1;
    $sql = "UPDATE carrinho SET quantidade = ? WHERE usuario_id = ? AND produto_id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "iii", $nova, $usuario_id, $produto_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: carrinho.php");
    exit;
}

// fallback
header("Location: carrinho.php");
exit;