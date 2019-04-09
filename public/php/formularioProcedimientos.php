<?php

include 'ficherosFormulario.php';

$fichero = new ficherosFormulario();

$informacion = $fichero->buscar($_POST['dni']);

if($informacion !== -1){

    echo '<form action="" method="post">
        Dni: <input type="text" name="dni" required value='.$informacion[0].'>
        Nombre: <input type="text" name="nombre" required value='.$informacion[1].'>
        Apellidos: <input type="text" name="apellidos" required value='.$informacion[2].'>
        Telefono: <input type="text" name="telefono" required value='.$informacion[3].'>
        Email: <input type="email" name="email" required value='.$informacion[4].'>
        Direccion: <input type="text" name="direccion" required value='.$informacion[5].'>
        <input type="submit" name="actualizar" value="actualizar">
    </form>';

 }else{
    header('Location: ../alta.html');
}
?>

<?php

$fichero = new ficherosFormulario();
if(isset($_POST['actualizar'])) {
    $fichero->actualizar($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['direccion']);
}
?>

<?php
$fichero = new ficherosFormulario();
if (isset($_POST['alta'])){
   $fichero->darDeAlta($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['email'], $_POST['direccion']);

}