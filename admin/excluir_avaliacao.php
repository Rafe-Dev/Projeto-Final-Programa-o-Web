<?php
require 'config.inc.php';

$id = $_GET['id'];

$sql = $pdo->prepare("DELETE FROM avaliacoes WHERE id = ?");
$sql->execute([$id]);

header("Location: listar_avaliacoes.php");