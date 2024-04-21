<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        die ("Cadastro relizado com sucesso! <p><a href=\"index.php\">Entrar</a></p>");
    }

?>