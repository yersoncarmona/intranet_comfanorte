<?php

//configuracion para acceder a la bd
function conn(){
    $hostname = "localhost";
    $usuariodb = "root";
    $contraseñadb = "";
    //$usuariodb = "serve5gl_comfanorte";
    //$contraseñadb = "comfanorte2023";
    $nombredb = "intranet_comfanorte";

    //Conexion con el servidor
    $conectar = mysqli_connect($hostname, $usuariodb, $contraseñadb, $nombredb);
    return $conectar;
    //cargar caracteres de utf8
    mysqli_set_charset($conectar, "utf8");
    if(!$conectar){

        echo"error en la conexion con el servidor";

    }

}

?>
