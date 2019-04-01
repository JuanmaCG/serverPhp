<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Descargas</title>
</head>
<body>

    <h1>ENLACES DE DESCARGA</h1>

    <button><a href="protected.php?archivo=README.MD">Descargar readme</button></a>



    <?php

        if(!isset($_GET['archivo']) || empty($_GET['archivo'])){
            exit;
        }

        $archivo = basename($_GET['archivo']);

        $ruta = '../descargas/'.$archivo;

        if(is_file($ruta)){
            header('Content-Type: application/force-download');
            header('Content-Disposition: attachment; filename='.$archivo);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: '.filesize($ruta));

            readfile($ruta);
        }else {
            exit;
        }

    ?>
</body>
</html>