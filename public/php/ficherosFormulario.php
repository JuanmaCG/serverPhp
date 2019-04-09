<?php


class ficherosFormulario{

    private $filecontent;
    private $file = "../usuarios.txt";


    function __construct()
    {
        // comprobamos si existe el fichero para crearlo
        if(!file_exists($this->file)){
            fopen($this->file, "a");
            fclose($this->file);
        }
        //cargamos el contenido del fichero en memoria
        $this->filecontent = file("../usuarios.txt");
    }

    function buscar($dni){
        $informacion = array();

        // creamos un array bidimensional [registro][informacion]
        for($i = 0; $i < sizeof($this->filecontent); $i++){
            $registro = explode(",", $this->filecontent[$i]);
            for($j = 0; $j < sizeof($registro); $j++){
                $informacion[$i][$j] = $registro[$j];
            }
        }

        // buscamos si el dni coincide en algun campo dni
        for ($i = 0; $i < sizeof($informacion[$i]); $i++){
            if($informacion[$i][0] == $dni){
                return $informacion[$i];
            }
        }

        return -1;

    }

    function actualizar($dni,$nombre,$apellidos,$telefono,$email,$direccion){

        $contador = 0;

        //buscamos el dni y modificamos ese campo con los valores introducidos

        foreach ($this->filecontent as $datos){
            if($dni == substr($datos,0,strlen($dni))){
                $this->filecontent[$contador] = $dni.','.$nombre.','.$apellidos.','.$telefono.','.$email.','.$direccion;
            }else{
                $contador = $contador + 1;
            }

        }

        $archivo = fopen("$this->file", "w+");

        // reescribimos el fichero

        foreach ($this->filecontent as $registro){
            fwrite($archivo,$registro);

        }


        fclose($archivo);
    }


    function darDeAlta($dni,$nombre,$apellidos,$telefono,$email,$direccion){
        $archivo = fopen("$this->file", "a");

        // introducimos al final del fichero el nuevo registro
        fwrite($archivo,PHP_EOL.$dni.','.$nombre.','.$apellidos.','.$telefono.','.$email.','.$direccion);
        fclose($archivo);
    }
}