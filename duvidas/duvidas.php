<?php
$status_msg = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == "ok") {
        $status_msg = "<p class='msg-sucesso'>Sua dúvida foi enviada com sucesso!</p>";
    } elseif ($_GET['status'] == "erro") {
        $status_msg = "<p class='msg-erro'>Ocorreu um erro ao enviar sua dúvida.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dúvidas do Cliente</title>
    <link rel="stylesheet" href="../css/dúvidas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400;700">
</head>
<body>


<header class="header">
    <div class="header-container">
        <h1 class="header-title">Mande Sua Dúvida !</h1>
        <nav class="header-menu">
            
            <a href="../páginaprincipal.html"><span class="material-symbols-outlined">home</span></a>
            <a href="../Sobre Nós.html"><span class="material-symbols-outlined">info</span></a>
            <a href="../perguntasfrequentes.html"><span class="material-symbols-outlined">support</span></a>
            <a href="../contatos/avaliacao.php"><span class="material-symbols-outlined">star</span></a>

        </nav>
    </div>
</header>


<main>
    <h1 class="titulo-principal">Envie suas dúvidas para nós!</h1>

    <?= $status_msg ?>

    <div class="form-avaliacao">
        <form action="../valida_contato.php" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Telefone</label>
            <input type="numero" name="numero" required>

            <label>Sua dúvida</label>
            <textarea name="mensagem" rows="6" required></textarea>

            <button type="submit" class="botao-enviar">Enviar Dúvida</button>
        </form>
    </div>
</main>


<footer>
    <p>© 2025 IT SUPPORT — Todos os direitos reservados</p>
</footer>

</body>
</html>
