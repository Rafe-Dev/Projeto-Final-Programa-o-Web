<?php

$nome  = $_POST['nome']  ?? '';
$numero = $_POST['numero'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';

if (empty($nome) || empty($numero) || empty($mensagem)) {
    die("❌ algum espaços ainda pode estar vazio, por favor preencha todos os espaços obrigatórios!");
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=projeto1;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = $pdo->prepare("INSERT INTO duvidas (nome, numero, mensagem) VALUES (:nome, :numero, :mensagem)");

    $sql->execute([
        ':nome'  => $nome,
        ':numero' => $numero,
        ':mensagem' => $mensagem
    ]);

$whatsapp = "5581981612239"; // seu número (55+DDD+número)

$texto = "Nova dúvida recebida!\n\n";
$texto .= "Nome: $nome\n";
$texto .= "Número: $numero\n";
$texto .= "Mensagem: $mensagem";

$texto_encoded = urlencode($texto);
header("Location: https://api.whatsapp.com/send?phone={$whatsapp}&text={$texto_encoded}");

} catch (PDOException $e) {
    die("Erro ao Cadastrar: " . $e->getMessage());
}

?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AVALIAÇÃO</title>
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
    <h1>✅ MENSAGEM ENVIADA COM SUCESSO!</h1>
    <p>OBRIGADO POR NOS MANDAR SUA DÚVIDA <br><?php echo htmlspecialchars($nome); ?>!</p>
    <p>RETORNAREMOS O MAIS RÁPIDO POSSÍVEL!</p>
    <p>
       <button class="botao" onclick="event.stopPropagation(); location.href='páginaprincipal.html';">
                VOLTAR AO INÍCIO
            </button>
    </p>
    