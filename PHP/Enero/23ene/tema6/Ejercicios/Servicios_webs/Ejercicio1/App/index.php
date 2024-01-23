<?php


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación Web Prueba de Servicios</title>
</head>
<body>
    <h1>Aplicación Web Prueba de Servicios</h1>

    <?php

define("DIR_SERV", "http://localhost/Proyectos/PHP/tema6/Ejercicios/Servicios_webs/Ejercicio1/servicios_rest/");
    
function consumir_servicios_REST($url,$metodo,$datos=null)
{
    $llamada=curl_init();
    curl_setopt($llamada,CURLOPT_URL,$url);
    curl_setopt($llamada,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($llamada,CURLOPT_CUSTOMREQUEST,$metodo);
    if(isset($datos))
        curl_setopt($llamada,CURLOPT_POSTFIELDS,http_build_query($datos));
    $respuesta=curl_exec($llamada);
    curl_close($llamada);
    return $respuesta;
}

$datos["cod"]="YYYYYYYYY";
$datos["nombre"]="producto a borrar";
$datos["nombre_corto"]="productos a borrar";
$datos["descripcion"]="producto a borrar";
$datos["PVP"]=20;
$datos["familia"]="MP3";

$url=DIR_SERV."/producto/insertar";

$respuesta=consumir_servicios_REST($url,"POST", $datos);

$obj=json_decode($respuesta);

if(!$obj){
    die("<p>Error consumiento el servicio: ".$url."</p>".$respuesta);
}
if(isset($obj->mensaje_error))
    die("<p>Error: ".$obj->mensaje_error."</p></body></html>");

 echo "<p>".$obj->mensaje."</p>";


?>
    
</body>
</html>