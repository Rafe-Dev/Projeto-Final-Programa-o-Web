<?php

$nome  = $_POST['nome']  ?? '';
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($nome) || empty($email) || empty($senha)) {
    die("❌ Nome, email ou senha estão vazios!");
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=projeto1;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $pdo->prepare("INSERT INTO login (nome, email, senha) VALUES (:nome, :email, :senha)");

    $sql->execute([
        ':nome'  => $nome,
        ':email' => $email,
        ':senha' => $senha
    ]);

} catch (PDOException $e) {
    die("Erro ao Cadastrar: " . $e->getMessage());
}


?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmação do Pedido</title>
<style>
body { font-family: Arial, sans-serif; background:#f4f4f4; display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
.container { background:#fff; padding:20px; border-radius:8px; max-width:500px; width:100%; box-shadow:0 0 10px rgba(0,0,0,0.1); text-align:center; }
h1 { color:#333; }
pre { background:#f0f0f0; padding:10px; border-radius:5px; text-align:left; white-space: pre-wrap; word-wrap: break-word; }
.btn-whatsapp { display:inline-block; margin-top:20px; padding:12px 20px; background:#25D366; color:#fff; font-weight:bold; border:none; border-radius:5px; text-decoration:none; font-size:16px; }
.btn-whatsapp:hover { background:#1ebe57; }
</style>
</head>
<body>
<div class="container">
    <h1>✅ Cadastro Realizado com Sucesso!</h1>
    <p>Obrigado por se cadastrar, <?php echo htmlspecialchars($nome); ?>!</p>
    