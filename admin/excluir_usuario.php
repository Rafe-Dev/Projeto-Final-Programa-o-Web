<?php
require 'config.inc.php';

$id = $_GET['id'];

$sql = $pdo->prepare("DELETE FROM login WHERE id = ?");
$sql->execute([$id]);

header("Location: listausuarios.php");