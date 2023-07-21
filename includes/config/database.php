<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost', 'root', '', 'abastoscheck_db');

    if(!$db){
        echo 'No se pudo conectar a la base de datos';
        exit;
    }
    return $db;
}