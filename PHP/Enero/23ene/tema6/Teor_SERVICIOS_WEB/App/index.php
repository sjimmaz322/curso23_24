<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoría Servicios Webs</title>
</head>
<body>
    <h1>Teoría Servicios Webs</h1>

    <?php
    define("DIR_SERV", "http://localhost/Proyectos/PHP/tema6/Teor_SERVICIOS_WEB/primera_api/");
    
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
    
    
    
    
    $url=DIR_SERV."/saludo";
    //$respuesta=file_get_contents($url);
    //smp obtengo un objeto
    $respuesta=consumir_servicios_REST($url,"GET");

    $obj=json_decode($respuesta);
    echo "<p>1) Metodo GET</p>";

    if(!$obj){
        die("<p>Error consumiento el servicio: ".$url."</p>".$respuesta);
    }
    //si no muero
    echo "<p>El mensaje recibido ha sido <strong>".$obj->mensaje."</strong></p>";
    /*Necesito saber:
    url de ataque, la ruta entera, que me va a devolver, tipo de metodo,si es get post delete etc..
        para comprobarlo con la ruta: http://localhost/Proyectos/PHP/tema6/Teor_SERVICIOS_WEB/primera_api/saludo
    */

    //METODO DE TIPO GET PASANDOLE PARÁMETROS********************************
    echo "<p>2) Metodo GET con parámetros</p>";

    //se llame get saludo y le pase el nombre
    // $url=DIR_SERV."/saludo/Antonia";
    $url=DIR_SERV."/saludo/".urlencode("Maria Antonia");

    //$respuesta=file_get_contents($url);
    //smp obtengo un objeto
    $respuesta=consumir_servicios_REST($url,"GET");

    $obj=json_decode($respuesta);

    if(!$obj){
        die("<p>Error consumiento el servicio: ".$url."</p>".$respuesta);
    }
    //si no muero
    echo "<p>El mensaje recibido ha sido <strong>".$obj->mensaje."</strong></p>";


    //METODO DE TIPO POST********************************
echo "<p>3) Metodo POST</p>";
    $url=DIR_SERV."/saludo";
    //datos array asociativo
    $datos["nombre"]="Juan Alonso Gomez";
    $respuesta=consumir_servicios_REST($url,"POST",$datos);
    $obj=json_decode($respuesta);

    if(!$obj)
        die("<p>Error consumiento el servicio: ".$url."</p>".$respuesta);
    //si no muero
    echo "<p>El mensaje recibido ha sido <strong>".$obj->mensaje."</strong></p>";
    
    //METODO DE TIPO DELETE********************************
    //Al cual le vamos a pasar que borre el dato por debajo
    echo "<p>4) Metodo DELETE</p>";
    $url=DIR_SERV."/borrar_saludo/37";
    //datos array asociativo
   
    $respuesta=consumir_servicios_REST($url,"DELETE");
    $obj=json_decode($respuesta);

    if(!$obj)
        die("<p>Error consumiento el servicio: ".$url."</p>".$respuesta);
    //si no muero
    echo "<p>El mensaje recibido ha sido <strong>".$obj->mensaje."</strong></p>";
    
     //METODO DE PUT*******************************
    //se ha cambiado el nombre con id noseque a este valor, 
    //por encima id y por debajo el nuevo nombre.
    echo "<p>4) Metodo PUT</p>";
    $url=DIR_SERV."/actualizar_saludo/78";
    
    $datos["nombre"]="Pepe Pérez";
    $respuesta=consumir_servicios_REST($url,"PUT",$datos);
    $obj=json_decode($respuesta);

    if(!$obj)
        die("<p>Error consumiento el servicio: ".$url."</p>".$respuesta);
    //si no muero
    echo "<p>El mensaje recibido ha sido <strong>".$obj->mensaje."</strong></p>";
    
    



?>
</body>
</html>