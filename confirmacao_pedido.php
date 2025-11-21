<?php
// confirmacao_pedido.php
session_start();
require_once "conexao.php";

$pedido_id = isset($_GET['pedido_id']) ? (int) $_GET['pedido_id'] : 0;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="utf-8"/><title>Confirmacao</title></head>
<body>
  <h2>Pedido confirmado!</h2>
  <p>Seu número de pedido é: <?= htmlspecialchars($pedido_id) ?></p>
  <p>Obrigado pela compra!!.</p>
  <a href="index.php">Voltar à loja</a>
</body>
</html>