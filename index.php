<?php
session_start();
require_once("conexao.php");  
$error = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty($_POST['email']) || empty($_POST['senha'])){
        $error = "Preencha todos os campos!";
    } else {
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $senha = trim($_POST['senha']);
        
        if(!$email){
            $error = "E-mail inválido!";
        } else {
            $sql = $mysqli->prepare("SELECT id, nome, senha FROM usuarios WHERE email = ?");
            $sql->bind_param("s", $email);
            $sql->execute();
            $resultLogin = $sql->get_result();
            $userLogin = $resultLogin->fetch_assoc();

            if ($resultLogin->num_rows === 1) {
                if ($userLogin && password_verify($senha, $userLogin['senha'])) {
                    session_regenerate_id(true);
                    $_SESSION['id'] = $userLogin['id'];
                    $_SESSION['nome'] = $userLogin['nome'];
                    header("Location: home.php");
                    exit();
                } else {
                    $error = "E-mail ou senha incorretos!";
                }
            } else {
                $error = "E-mail ou senha incorretos!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style01.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="scripts/index01.js"></script>
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <title>Login</title>
</head>

<body>
    <?php if($error): ?>
    <div class="erro"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form action="index.php" method="POST">
        <h1>Login</h1>
        <div class="form_div">
            <input type="text" name="email" id="input_email" required>
            <label for="email">E-mail</label>
            <img src="imagens/icon_login.png" alt="Icone email" id="icon_login">
        </div>
        <div class="form_div">
            <input type="password" name="senha" id="input_senha" oninput="on_pass()" required>
            <label for="senha">Senha</label>
            <img src="imagens/icon_senha.png" alt="Icone senha" id="icon_senha">
            <i class="bi bi-eye-fill" id="btn_senha" onclick="eye_pass()"></i>
            <!--bi bi-eye-slash-fill-->
        </div>
        <div class="cadastro">
            <p>
                Não tem uma conta? <a href="cadastro.php" target="_self">Cadastre-se</a>
            </p>
        </div>
        <button type="submit">Entrar</button>
    </form>
    <footer>
        <img src="imagens/logo-monni.png" alt="Logo">
    </footer>
</body>

</html>