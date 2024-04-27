<?php
require_once("conexao.php");     //pagina de conexão com o banco

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql = $mysqli->prepare("SELECT nome, senha FROM usuarios WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $resultado = $sql->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($resultado->num_rows === 1) {
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: home.php");
        } else {
            echo "E-mail ou senha incorretos!";
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
            <i class="bi bi-eye-fill" id="btn_senha" onclick="eye_pass()"></i> <!--bi bi-eye-slash-fill-->
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