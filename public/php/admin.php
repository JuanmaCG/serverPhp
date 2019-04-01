<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion</title>
</head>
<body>
    
    <?php
        include 'login.php';
        
        if($_SESSION['username'] !== "admin"){
            header("Location: ../login.html");
        }

    ?>

    <h1>Pagina de adminisracion</h1>

    <form action="/php/logout.inc.php" method="POST">
        <input type="submit" value="Logout" name="logout">
    </form>

    <a href="adminer.php"><button>Adminer</button></a>
        <!--  acceso solo para "admin"  -->


    <br><button><a href='/php/usuarios.php'>Usuarios Registrados</button></a>
        
 

</body>
</html>