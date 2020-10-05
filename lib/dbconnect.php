<?php
    $host = 'localhost';
    $usuario = 'root';
    $senha = 'sua-nova-senha';
    $banco = 'site';

    $con = new mysqli($host, $usuario, $senha, $banco);

    if(mysqli_connect_error()){
        exit("Erro ao conectar-se ao banco de dados." . mysqli_connect_error());
    }
?>