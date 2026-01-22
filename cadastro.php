<?php
require_once("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome'])) {  
    $nome = trim($_POST['nome']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $senha = trim($_POST['senha']);
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    if(empty($nome) || empty($email) || empty($senha)){
        die("Todos os campos são obrigatórios!");
    }

    if(!$email){
        die("E-mail inválido!");
    }

    if(strlen($senha) < 8){
        die("A senha deve ter no mínimo 8 caracteres!");
    }

    if(strlen($nome) < 3){
        die("O nome deve ter no mínimo 3 caracteres!");
    }

    $sql = $mysqli->prepare("SELECT * FROM usuarios WHERE EMAIL = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $result = $sql->get_result();
    $count = $result->num_rows;
    

    if ($count == 1) {
        die("Este email já está cadastrado! <p><a href='cadastro.php'>Tentar outro email</a></p>");
    } else {
        $sql_insert = $mysqli->prepare("INSERT INTO usuarios (nome, email, senha) VALUES(?, ?, ?)");
        $sql_insert->bind_param("sss", $nome, $email, $hash);
        $sql_insert->execute();
        
        if($sql_insert->affected_rows > 0){
            include("cadastrado.php");
        }else{
            die("Erro ao cadastrar usuário.");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style-cadastro.css">
    <link rel="shortcut icon" href="favicon_io/favicon.ico" type="image/x-icon">
    <script src="scripts/cad.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Cadastre-se</title>
</head>

<body>
    <form action="cadastro.php" method="POST">
        <h1>Cadastre-se</h1>
        <div class="form_div">
            <input type="text" name="nome" required>
            <label for="nome" class="form_label">Nome</label>
            <img src="imagens/icon_login.png" alt="Icone de login" class="form_icons">
        </div>
        <div class="form_div">
            <input type="text" name="email" required>
            <label for="email" class="form_label">Email</label>
            <img src="imagens/icon_post.png" alt="Icone de email" class="form_icons">
        </div>
        <div class="form_div">
            <input type="password" name="senha" id="input_senha" oninput="on_pass_cad()" required>
            <label for="senha" class="form_label">Senha</label>
            <img src="imagens/icon_senha.png" alt="Icone de senha" id="icon_senha">
            <i class="bi bi-eye-fill" id="btn_senha_cad" onclick="eye_pass_cad()"></i>
        </div>
        <Button type="submit">Finalizar</Button>
    </form>
</body>
<footer>
    <img src="imagens/logo-monni.png" alt="Logo">
</footer>

</html>