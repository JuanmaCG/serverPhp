


<?php


    include 'login.php';

    if($_SESSION['username'] !== "admin"){
        header("Location: ../");
        exit;
    }

?>


<?php

    include_once 'conexion.inc.php';
    $usuarios = $conexion->query("SELECT * FROM usuarios");

?>


<table border ="1px solid">
    <tr>
        <td>Username</td>
        <td>Password</td>
   </tr>
    
    <?php 
    while($u = $usuarios->fetch_assoc()){ ?>
    
        <tr>
            <td><?php echo $u['username']; ?></td>
            <td><?php echo $u['password']; ?></td>
        </tr>

    <?php } ?>

</table>