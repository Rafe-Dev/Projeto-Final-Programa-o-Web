<?php
include "conexao.php";

$sql = "SELECT * FROM usuarios";
$result = $conexao->query($sql);

while($row = $result->fetch_assoc()){
    echo "ID: " . $row["id_usuario"] . " - Nome: " . $row["nome"] . "<br>";
}
?>