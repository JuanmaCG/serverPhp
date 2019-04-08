<?php

    include 'conexion.php';

    $buscarUsuario = "SELECT * FROM $tbl_name
                    WHERE username = '$_POST[username]' ";

    $result = $conexion->query($buscarUsuario);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "<br />". "El Nombre de Usuario ya existe." . "<br />";

        echo "<a href='registro.html'>Por favor escoja otro Nombre</a>";
    }else{
        $form_pass = $_POST['password'];
        $hash = password_hash($form_pass, PASSWORD_BCRYPT);

        $query = "INSERT INTO usuarios (username, password)
                VALUES ('$_POST[username]', '$hash')";

        if ($conexion->query($query) === TRUE) {
    
            echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
            echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
            echo "<h5>" . "Hacer Login: " . "<a href='../login.html'>Login</a>" . "</h5>"; 

        }else {
            echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
        }
    }

    mysqli_close($conexion);
?>