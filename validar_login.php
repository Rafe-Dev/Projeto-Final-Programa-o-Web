<?php
// validar_login.php
session_start();
require_once "conexao.php";

$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($usuario) || empty($senha)) {
    echo "<script>alert('Informe usuário e senha'); location.href='login.php';</script>";
    exit;
}

$sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "s", $usuario);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$dados = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$dados) {
    echo "<script>alert('Usuário não encontrado'); location.href='login.php';</script>";
    exit;
}

$hash = $dados['senha'];

// primeiro tenta verificar hash
if (password_verify($senha, $hash)) {
    // ok
    $_SESSION['usuario_id'] = $dados['id'];
    $_SESSION['usuario_nome'] = $dados['usuario'];
    header("Location: index.php"); exit;
}

// fallback para senhas em texto (compatibilidade)
if ($senha === $hash) {
    $_SESSION['usuario_id'] = $dados['id'];
    $_SESSION['usuario_nome'] = $dados['usuario'];
    header("Location: index.php"); exit;
}

echo "<script>alert('Usuário ou senha incorretos'); location.href='login.php';</script>";
exit;