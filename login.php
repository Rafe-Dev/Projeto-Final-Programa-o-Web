<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <form action="validar_login.php" method="post">
        <fieldset>
            <legend>Insira os seus dados:</legend>
            
            <label for="fname">Nome de usuário:</label>
            <input type="text" id="fname" name="usuario" required />
            
            <label for="password">Sua senha:</label>
            <input type="password" id="password" name="senha" required/>
            
            <input type="submit" value="login" />
        </fieldset>
    </form>
</body>

</html>