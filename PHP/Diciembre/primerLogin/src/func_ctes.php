<?php

define("SERVIDOR", "localhost");
define("USUARIO", "jose");
define("CLAVE", "josefa");
define("BBDD", "bd_foro2");
define("SEGUNDOS", 10);

function error_page($title, $body)
{
    $page = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>' . $title . '</title>
    </head>
    <body>' . $body . '</body>
    </html>';
    return $page;
}
function yaEstaba($tabla, $columna, $dato)
{
    $conexion = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD);
    $consulta = "SELECT * FROM $tabla WHERE $columna = '$dato'";
    $resultado = mysqli_query($conexion, $consulta);
    if (mysqli_num_rows($resultado) > 0) {
        return true;
    } else {
        return false;
    }
}
