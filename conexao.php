<?php

    $mysqli = new mysqli(
        getenv('DB_HOST'), 
        getenv('DB_USER'), 
        getenv('DB_PASS'), 
        getenv('DB_NAME')
        );  //database
        
    if($mysqli->connect_errno){ //err
        error_log("Erro de conexão: " . $mysqli ->connect_error); //save in log
        die("Erro ao conectar com o banco.");
    }

?>