<?php

session_start();
require_once("conexao.php");

if(!isset($_SESSION['id'])){
    $_SESSION['erro'] = "Você precisa estar logado para acessar essa página!";
    header("Location: index.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style01_home.css">
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <title>Início</title>
</head>

<body>
    <div class="lougout">
        <button type="button" id="btn_logout" onclick=" location.href='logout.php'" id=" btn_logout">
            Sair
        </button>
    </div>
    <div class="usuario">
        <img src="imagens/icon_email.png" alt="Icone usuário">
        <p><?php echo htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
    <h3>Seja bem vindo a tela de início!</h3>
</body>
<footer>
    © 2025 KindlyHelp • Gravataí, RS • gmonni002@gmail.com
</footer>

</html>