<?php
include('config.inc.php');

$id       = $_POST['id'];
$nome     = $_POST['nome'];
$numero   = $_POST['numero'];
$mensagem = $_POST['mensagem'];

$sql = "UPDATE duvidas 
        SET nome = :nome, numero = :numero, mensagem = :mensagem 
        WHERE id = :id";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':numero', $numero);
$stmt->bindParam(':mensagem', $mensagem);
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: listar_duvidas.php");
exit;