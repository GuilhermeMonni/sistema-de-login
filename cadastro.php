<?php
require_once("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {  //se existir cont nos inputs
    $nome = ($_POST['nome']);    //variaveis dos inputs e evitando sql injection
    $email = ($_POST['email']);
    $senha = ($_POST['senha']);
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    $sql_code = "SELECT * FROM usuarios WHERE email ='$email'"; //fazendo validação do email
    $sql = $mysqli->query($sql_code);
    $quantidade = $sql->num_rows;       //linhas encontradas

    if ($quantidade == 1) {
        include("protect2.php");
    } else {
        $sql_insert = "insert into usuarios (nome, email, senha) values('$nome', '$email', '$hash')";
        $sql_query = $mysqli->query($sql_insert) or die("Falha" . $mysqli->connect_error);
        include("cadastrado.php");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/style_cad.css">
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
        </div>
        <div class="form_div">
            <input type="text" name="email" required>
            <label for="email" class="form_label">Email</label>
        </div>
        <div class="form_div">
            <input type="password" name="senha" id="input_senha" oninput="on_pass_cad()" required>
            <label for="senha" class="form_label">Senha</label>
            <i class="bi bi-eye-fill" id="btn_senha_cad" onclick="eye_pass_cad()"></i>
        </div>
        <Button type="submit">Finalizar</Button>
    </form>
</body>

</html>