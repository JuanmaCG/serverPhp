
<?php

    include_once 'conexion.php';
    $db_conexion = new Conexion();
    $resultadoConsulta = $db_conexion->query("select * from usuarios");


    if(isset($_POST['export'])){
        $fichero = "usuarios.xls";
        $ruta = '../descargas/'.$fichero;
        header('Content-Disposition: attachment; filename='.$fichero);
        header("Content-Type: application/vnd.ms-excel");


        $isPrintHeader = false;
        if (! empty($resultadoConsulta)) {
            foreach ($resultadoConsulta as $valor) {
                if (! $isPrintHeader) {
                    echo implode("\t", array_keys($valor)) . "\n";
                    $isPrintHeader = true;
                }
                echo implode("\t", array_values($valor)) . "\r\n";
            }
        }
        exit();
    }

?>
<?php


include 'login.php';

if($_SESSION['username'] !== "admin"){
    header("Location: ../");
    exit();
}

?>


<table border ="1px solid">
    <tr>
        <td>Username</td>
        <td>Password</td>
   </tr>

    <?php
   /* $sql = $db_conexion->query("select * from usuarios");*/
    if (! empty($resultadoConsulta)) {
        foreach ($resultadoConsulta as $valor => $value) {
            ?>

            <tr>
                <td><?php echo $resultadoConsulta[$valor]["username"]; ?></td>
                <td><?php echo $resultadoConsulta[$valor]["password"]; ?></td>
            </tr>
            <?php
        }
    }
    ?>

</table>

<br>



<div>
    <form action="" method="post">
        <button type="submit" name='export' value="Export to Excel">Export to excel</button>
    </form>
</div>