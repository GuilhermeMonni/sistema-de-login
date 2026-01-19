<?php

    $hostname = "sql111.infinityfree.com";    //servidor
    $bancodedados = "if0_40944182_banco";    //banco
    $usuario = "if0_40944182";          //usuario e senha do banco
    $senha = "xKXYrqPVNbqy";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);   //busca pelo banco
    if($mysqli->connect_errno){     //erro ao conectar com o banco
        die("Falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno);
    }

?>