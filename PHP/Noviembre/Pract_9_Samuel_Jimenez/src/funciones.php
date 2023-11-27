<?php
try {
    $conexion = mysqli_connect("localhost", "jose", "josefa", "bd_videoclub");
} catch (Exception $e) {
    mysqli_close($conexion);
    die(error_page("Error de Conexión","<h1>Error de conexión</h1><p>No he podido conectarse a la base de batos: ".$e->getMessage()."</p>"));
}
function error_page($title,$body)
{
    $page='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$title.'</title>
    </head>
    <body>'.$body.'</body>
    </html>';
    return $page;
}