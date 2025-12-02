<?php
require 'config.inc.php';

$id    = $_POST['id'];
$nome  = $_POST['nome'];
$email = $_POST['email'];
$avaliacao = $_POST['avaliacao'];

$sql = $pdo->prepare("UPDATE avaliacoes SET nome=?, email=?, avaliacao=? WHERE id=?");
$sql->execute([$nome, $email, $avaliacao, $id]);

header("Location: listar_avaliacoes.php");