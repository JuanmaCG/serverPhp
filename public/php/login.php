<?php
    
    session_start();

    if(!empty($_POST)){
        
        if ( isset( $_POST['usuario'] ) && isset( $_POST['contrasena'] ) ){
            $con = new mysqli("localhost", "root", "root","usuarios");
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE username = ?");
            $stmt->bind_param("s", $_POST['usuario']);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_object();
        }


        if ( password_verify( $_POST['contrasena'], $user->password ) ) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            if($_SESSION['username'] === "admin"){
                header("Location: admin.php");
            }else{
                header("Location: protected.php");
            }
        }else {
            header("Location: ../login.html");
        }

        
    }
    
    

?>