<?php
include('config.inc.php');

$id = $_GET['id'];

$sql = "DELETE FROM duvidas WHERE id = '$id'";
mysqli_query($conn, $sql);

header("Location: listar_duvidas.php");
?>