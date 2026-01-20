<?php

    $mysqli = new mysqli(
        getenv('DB_HOST'), 
        getenv('DB_USER'), 
        getenv('DB_PAS'), 
        getenv('DB_NAME')
        );  //database
        
    if($mysqli->connect_errno){ //err
        die("Falha ao conectar: (" . $mysqli->connect_errno . ")");
    }

?>