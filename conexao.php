<?php
//conexao central com o banco
// conexao.php
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = ''; 
$DB_NAME = 'lde_store';

$conexao = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$conexao) {
    die("Erro na conexão com o banco: " . mysqli_connect_error());
}
mysqli_set_charset($conexao, "utf8mb4");