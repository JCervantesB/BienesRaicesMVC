<?php

function conectarDB() : mysqli {
    $db = new mysqli('fdb32.awardspace.net', '3962135_bienesraices', 'J1807881', '3962135_bienesraices');

    if(!$db) {
        echo "Error no se pudo conectar";
        exit;
    } 

    return $db;
}