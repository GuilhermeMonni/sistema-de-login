<?php
session_start();
require_once("conexao.php");

if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style-home.css">
    <link rel="stylesheet" href="estilos/style-root.css">
    <link rel="stylesheet" href="estilos/style-sweet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./scripts/homeScript.js"></script>
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <title>Dashnet - Início</title>
</head>

<body>
    <header class="header-home">
        <div class="logo-container">
            <h1>Dashnet</h1>
        </div>
        <div class="user-info">
            <span class="user-name"><i
                    class="bi bi-person-fill user-icon"></i><?php echo htmlspecialchars($_SESSION['nome'], ENT_QUOTES, 'UTF-8'); ?></span>
            <button class="btn-edit" onclick="alert('Funcionalidade em desenvolvimento!')">
                <i class="bi bi-person-gear"></i> Editar Perfil
            </button>
            <button type="button" class="btn-logout" onclick="logout()">
                <i class="bi bi-box-arrow-right"></i> Sair
            </button>
        </div>
    </header>

    <main class="main-content">
        <div class="welcome-card">
            <h2>Bem-vindo,
                <?php echo htmlspecialchars(explode(' ', $_SESSION['nome'])[0], ENT_QUOTES, 'UTF-8'); ?>!</h2>
            <p class="subtitle">Você está logado no Dashnet</p>
        </div>
    </main>

    <footer>
        <img src="imagens/logo-monni.png" alt="Logo">
        <p>©2026 Dashnet • Gravataí, RS • gmonni20@gmail.com</p>
    </footer>
</body>

</html>