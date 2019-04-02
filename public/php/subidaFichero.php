<?php
$dir_subida = "../subidas/";

$fichero_subido = $dir_subida.basename($_FILES['fichero_usuario']['name']);

if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {
    echo "Fichero subido correctamente";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}