<?php
$mensagem = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == "ok") {
        $mensagem = "<p class='msg-sucesso'>Mensagem enviada com sucesso!</p>";
    } elseif ($_GET['status'] == "erro") {
        $mensagem = "<p class='msg-erro'>Erro ao enviar a mensagem.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - LDE</title>
    <link rel="stylesheet" href="../css/contato.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400;700" />
</head>

<body>

    <header>
        <div class="center">
            
            <div class="logo">
                <img src="../imagens/logo1.png" width="50" alt="Logo">
                <h1>LDE Store</h1>
            </div>


            <nav class="menu">
                <a href="../projeto.html">
                    <span class="material-symbols-outlined">home</span>
                    Home
                </a>

                <a href="../Sobre Nós.html">
                    <span class="material-symbols-outlined">info</span>
                    Sobre Nós
                </a>

                <a href="../perguntasfrequentes.html">
                    <span class="material-symbols-outlined">support</span>
                    Suporte
                </a>
            </nav>

        </div>
    </header>

    <h1 class="titulo-contato">Contato</h1>

    <?= $mensagem ?>

    <div class="form-contato">

        <form action="../valida_contato.php" method="POST">

            <label>Nome</label>
            <input type="text" name="nome" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Mensagem</label>
            <textarea name="mensagem" rows="6" required></textarea>

            <button type="submit" class="botao-contato">Enviar Mensagem</button>

        </form>

    </div>

    <footer>
        <p>© 2025 LDE STORE — Todos os direitos reservados</p>
    </footer>

</body>

</html>