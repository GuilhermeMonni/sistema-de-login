<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        die ("Cadastro realizado com sucesso! <p><a href=\"index.php\">Entrar</a></p>");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <title>Cadastro</title>
</head>
<body>
    
</body>
</html>