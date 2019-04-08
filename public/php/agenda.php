<?php
    /*$host_db = "localhost";
    $user_db = "root";
    $pass_db = "root";
    $db_name = "agenda";
    $tbl_name = "agenda";

    $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    mysqli_query($conexion, "set names 'UTF8'");*/

    include 'conexion.php';

    $db_conexion = new Conexion();

    $result = $db_conexion->query("select * from agenda");

    function insertarDatosFormulario($db_conexion){

        $stmt = $db_conexion->prepare("INSERT INTO agenda VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("ssssid", $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['telefono'], $_POST['edad'], $_POST['altura'] );
        $stmt->execute();

    }

    if(isset($_POST['insertar'])){

        insertarDatosFormulario($db_conexion);
        header("refresh:0");
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

<?php


    if(isset($_POST['consulta'])){
        $sql = $_POST['consulta'];
        $resultadoConsulta = $db_conexion->query($sql);
        $fichero = "agenda.xls";
        $ruta = '../descargas/' . $fichero;
        header('Content-Disposition: attachment; filename=' . $fichero);
        header("Content-Type: application/vnd.ms-excel");


        $isPrintHeader = false;
        if (!empty($resultadoConsulta)) {
            foreach ($resultadoConsulta as $valor) {
                if (!$isPrintHeader) {
                    echo implode("\t", array_keys($valor)) . "\n";
                    $isPrintHeader = true;
                }
                echo implode("\t", array_values($valor)) . "\r\n";
            }
        }
        exit();
    }






?>





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
    if (! empty($result)) {
        foreach ($result as $valor => $value) {
            ?>

            <tr>
                <td><?php echo $result[$valor]['nombre']; ?></td>
                <td><?php echo $result[$valor]['apellidos']; ?></td>
                <td><?php echo $result[$valor]['direccion']; ?></td>
                <td><?php echo $result[$valor]['telefono']; ?></td>
                <td><?php echo $result[$valor]['edad']; ?></td>
                <td><?php echo $result[$valor]['altura'] . " M"; ?></td>

            </tr>

        <?php }
    }
    ?>

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

<div>
    <form action="" method="post">
        <input type="text" name="consulta">
        <input type="submit" name="enviar" value="Consulta">
    </form>
</div>
