<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        die ("Este email já está cadastrado! <p><a href=\"index.php\">Entrar</a></p>");
    }

?>