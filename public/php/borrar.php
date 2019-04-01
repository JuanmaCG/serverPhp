<?php
        
        include 'login.php';

        include_once 'conexion.inc.php';

        $sql = "DELETE FROM usuarios WHERE username = '".$_SESSION['username']."'"; 
        if($conexion->query($sql) === true){ 
                echo "Registro borrado"; 
        } else{ 
                echo "ERROR: Could not able to execute $sql. "  
                                                . $conexion->error; 
        } 
        
        

        $conexion->close(); 

        include 'logout.inc.php';       
        

?>