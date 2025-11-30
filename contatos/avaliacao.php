<?php
$status_msg = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == "ok") {
        $status_msg = "<p class='msg-sucesso'>Sua avaliação foi enviada com sucesso!</p>";
    } elseif ($_GET['status'] == "erro") {
        $status_msg = "<p class='msg-erro'>Ocorreu um erro ao enviar sua avaliação.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação IT</title>
    <link rel="stylesheet" href="../css/avaliação.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400;700">
</head>
<body>


<header class="header">
    <div class="header-container">
        <h1 class="header-title">Avaliação</h1>
        <nav class="header-menu">
            
            <a href="../páginaprincipal.html"><span class="material-symbols-outlined">home</span></a>
            <a href="../Sobre Nós.html"><span class="material-symbols-outlined">info</span></a>
            <a href="../perguntasfrequentes.html"><span class="material-symbols-outlined">support</span></a>
            <a href="../duvidas/duvidas.php"><span class="material-symbols-outlined">message</span></a>

        </nav>
    </div>
</header>


<main>
    <h1 class="titulo-principal">Deixe sua avaliação do nosso site!</h1>

    <?= $status_msg ?>

    <div class="form-avaliacao">
        <form action="../valida_avaliacao.php" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Avaliação</label>
            <textarea name="mensagem" rows="6" required></textarea>

            <button type="submit" class="botao-enviar">Enviar Avaliação</button>
        </form>
    </div>
</main>


<footer>
    <p>© 2025 IT SUPPORT — Todos os direitos reservados</p>
</footer>

</body>
</html>