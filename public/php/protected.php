<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        
        session_start();

        if(isset($_SESSION['user_id']) === false){
            header("Location: ../login.html");
        }

        if(isset($_POST['logout'])){
            include 'logout.inc.php';
        }
        
        if(isset($_POST['borrar'])){
            include 'borrar.php';
        }
        
        echo "<h1>Has iniciado sesion como ".$_SESSION['username']."</h1>";
    ?>



    <form action="logout.inc.php" method="POST">
        <input type="submit" value="Logout" name="logout">
    </form>
   

    <form action = "borrar.php" method = "POST">
        <input type = "submit" value = "Borrar mi cuenta!!!!!!!!" name="borrar">
    </form>

    <br>


        <form enctype="multipart/form-data" action="subidaFichero.php" method="POST">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" /><br>
            Enviar este fichero: <input name="fichero_usuario" type="file" /><br>
            <input type="submit" value="Enviar fichero" />
        </form>


    <?php
        include_once 'descargas.inc.php';
    ?>






</body>
</html>