<?php

require_once("conexao.php");
session_start();

if(!isset($_SESSION['nome'])){
    die("Você precisa estar logado para acessar essa página! <p><a href=\"index.php\">Fazer login</a></p>");
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style_home.css">
    <title>Início</title>
</head>

<body>
    <div class="lougout">
        <button type="button" value="Sair" onclick="location.href='logout.php'" id="btn_logout">
            <p>Sair</p>
        </button>
    </div>
    <div class="usuario">
        <img src="imagens/icon_email.png" alt="Icone usuário">
        <p><?php echo $_SESSION['nome']; ?></p>
    </div>
    <h3>Seja bem vindo a tela de início!</h3>
</body>

</html>