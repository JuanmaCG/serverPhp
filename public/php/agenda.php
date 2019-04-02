<?php
    $host_db = "localhost";
    $user_db = "root";
    $pass_db = "root";
    $db_name = "agenda";
    $tbl_name = "agenda";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    mysqli_query($conexion, "set names 'UTF8'");

//    mysqli_query($conexion, "INSERT INTO agenda VALUES('1', '2', '3', '4', 5, 6.0)");  INSERTA DATOS

    $result = mysqli_query($conexion, "SELECT * FROM agenda");

    function insertarDatosFormulario($conexion){

        $stmt = $conexion->prepare("INSERT INTO agenda VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssid", $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['telefono'], $_POST['edad'], $_POST['altura'] );
        $stmt->execute();

    }

    if(isset($_POST['insertar'])){

        insertarDatosFormulario($conexion);
    }

/*    $sql = "create table ciudad (
        id int not null primary key auto_increment,
        ciudad varchar(50),
        pais varchar(50),
        habitantes int,
        superficie float,
        tieneMetro boolean
    )";

    if(mysqli_query($conexion, $sql)){
        echo "Tabla creada.";
    } else{
        echo "ERROR $sql. " . mysqli_error($conexion);
    }



    $conexion->close();

*/?>





    <table border ="1px solid">
    <tr>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Direccion</td>
        <td>Telefono</td>
        <td>Edad</td>
        <td>Altura</td>
   </tr>

    <?php
    while($agenda = $result->fetch_assoc()){ ?>

        <tr>
            <td><?php echo $agenda['nombre']; ?></td>
            <td><?php echo $agenda['apellidos']; ?></td>
            <td><?php echo $agenda['direccion']; ?></td>
            <td><?php echo $agenda['telefono']; ?></td>
            <td><?php echo $agenda['edad']; ?></td>
            <td><?php echo $agenda['altura']." M"; ?></td>

        </tr>

    <?php } ?>

</table>

<br>


<form action="agenda.php" method="POST">

    <label>Nombre: </label><input type = "text" name ="nombre" required><br>
    <label>Apellidos: </label><input type = "text" name ="apellidos" required><br>
    <label>Direccion: </label><input type = "text" name ="direccion" required><br>
    <label>Telefono: </label> <input type = "text" name ="telefono" required><br>
    <label>Edad: </label> <input type = "number" name ="edad" required><br>
    <label>Altura: </label> <input type = "number" name ="altura" step="0.01" required><br>
    <input type="submit" value="insertar" name ="insertar">
</form>
