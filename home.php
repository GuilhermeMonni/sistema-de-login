<?php
session_start();
require_once("conexao.php");

if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $content = trim($_POST['content'] ?? '');
    
    if (empty($content)) {
        echo json_encode(['error' => 'Conteúdo vazio']); //create popup
    }

    if (strlen($content) > 500) {
        echo json_encode(['error' => 'Máximo 500 caracteres']); //create popup
    }
    
    $user_id = $_SESSION['id'];

    try{
        $stmt = $pdo->prepare("INSERT INTO posts (user_id, content) VALUES (?, ?)");
        $stmt->execute([$user_id, $content]);
        
        echo json_encode([
            'success' => true, 
            'message' => 'Post publicado', 
            'post_id' => $pdo->lastInsertId()
        ]);
    } catch(PDOException $e){
        echo json_encode(['Erro ao publicar: ' . $e->getMessage()]);
    }
    
} else {
    echo json_encode(['Error' => 'Método não permitido!']);
} //create popups

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
    <title>Dashnet</title>
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
        <form method="POST" class="post-form">
            <textarea id="post-content" name="content" placeholder="No que você está pensando?" rows="4"
                maxlength="500"></textarea>

            <div class="post-actions">
                <span class="char-counter">0/500</span>
                <button type="submit" class="btn-publish">Publicar</button>
            </div>
        </form>
        🚧 Em desenvolvimento 🚧
    </main>

    <footer>
        <img src="imagens/logo-monni.png" alt="Logo">
        <p>©2026 Dashnet • Gravataí, RS • gmonni20@gmail.com</p>
    </footer>
</body>

</html>