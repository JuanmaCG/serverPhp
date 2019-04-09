<?php


class ficherosFormulario{

    private $filecontent;
    private $file = "../usuarios.txt";


    function __construct()
    {
        if(!file_exists($this->file)){
            fopen($this->file, "a");
            fclose($file);
        }
        $this->filecontent = file("../usuarios.txt");
    }

    function buscar($dni){
        $informacion = array();

        for($i = 0; $i < sizeof($this->filecontent); $i++){
            $registro = explode(",", $this->filecontent[$i]);
            for($j = 0; $j < sizeof($registro); $j++){
                $informacion[$i][$j] = $registro[$j];
            }
        }

        for ($i = 0; $i < sizeof($informacion[$i]); $i++){
            if($informacion[$i][0] == $dni){
                return $informacion[$i];
            }
        }

        return -1;

    }

    function actualizar($dni,$nombre,$apellidos,$telefono,$email,$direccion){

        $contador = 0;

        foreach ($this->filecontent as $datos){
            if($dni == substr($datos,0,strlen($dni))){
                $this->filecontent[$contador] = $dni.','.$nombre.','.$apellidos.','.$telefono.','.$email.','.$direccion;
            }else{
                $contador = $contador + 1;
            }

        }

        $archivo = fopen("$this->file", "w+");

        foreach ($this->filecontent as $registro){
            fwrite($archivo,$registro);

        }


        fclose($archivo);
    }


    function darDeAlta($dni,$nombre,$apellidos,$telefono,$email,$direccion){
        $archivo = fopen("$this->file", "a");


        fwrite($archivo,PHP_EOL.$dni.','.$nombre.','.$apellidos.','.$telefono.','.$email.','.$direccion);
        fclose($archivo);
    }
}