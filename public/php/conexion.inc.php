<?php
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "root";
    $db_name = "usuarios";
    $tbl_name = "usuarios";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }
?>