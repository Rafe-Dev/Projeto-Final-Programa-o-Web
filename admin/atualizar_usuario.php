<?php
require 'config.inc.php';

$id    = $_POST['id'];
$nome  = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = $pdo->prepare("UPDATE login SET nome=?, email=?, senha=? WHERE id=?");
$sql->execute([$nome, $email, $senha, $id]);

header("Location: listausuarios.php");