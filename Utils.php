<?php

class Utils
{
    public static function conectar()
    {
        //Datos de conexion
        $servidor = 'localhost';
        $usuario = 'root';
        $clave = 'root';
        $baseDeDatos = 'dws_juguetes';
        $conexion = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);
        //Verificamos que no hay errores en la conexion
        if (mysqli_connect_error()) {
            die('Error de conexion (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
        }
        //Indicamos la codificacion de caracteres
        $conexion->set_charset("utf8");
        return $conexion;
    }
    public static function getHead($tittle)
    {
        return '
        <title>'.$tittle.'</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        ';
    }
}
?>