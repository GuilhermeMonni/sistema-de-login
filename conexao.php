<?php

    $hostname = "localhost";    //servidor
    $bancodedados = "banco";    //banco
    $usuario = "root";          //usuario e senha do banco
    $senha = "";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);   //busca pelo banco
    if($mysqli->connect_errno){     //erro ao conectar com o banco
        die("Falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno);
    }

?>