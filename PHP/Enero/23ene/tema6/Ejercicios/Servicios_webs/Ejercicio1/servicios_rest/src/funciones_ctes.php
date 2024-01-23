<?php

define("SERVIDOR_BD", "localhost");
define("USUARIO_BD", "jose");
define("CLAVE_BD", "josefa");
define("NOMBRE_BD", "bd_tienda");

function obtener_productos()
{
    try {
        $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch (PDOException $e) {
        $conexion = null;
        // session_destroy();

        // $respuesta["mensaje_error"]="No he podido conectarse a la base de batos: ".$e->getMessage();
        return array("mensaje_error" => "No he podido conectarse a la base de batos: " . $e->getMessage());
    }

    try {
        $consulta = "select * from producto";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute();
    } catch (PDOException $e) {
        $sentencia = null;
        $conexion = null;
        // session_destroy();
        return array("mensaje_error" => "No he podido conectarse a la base de batos: " . $e->getMessage());
    }
    //respuesta con el indice producto, que me va a devolver todos los productos
    $respuesta["productos"] = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $sentencia = null;
    $conexion = null;
    return $respuesta;

    //recuerda probarlo en la siguiente url
    //http://localhost/Proyectos/PHP/tema6/Ejercicios/Servicios_webs/Ejercicio1/servicios_rest/productos

}


function obtener_producto($codigo)
{
    try {
        $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch (PDOException $e) {
        $conexion = null;
        return array("mensaje_error" => "No he podido conectarse a la base de batos: " . $e->getMessage());
    }

    try {
        $consulta = "select * from producto where cod=?";
        $sentencia = $conexion->prepare($consulta);
        $sentencia->execute([$codigo]);
    } catch (PDOException $e) {
        $sentencia = null;
        $conexion = null;
        // session_destroy();
        return array("mensaje_error" => "No he podido conectarse a la base de batos: " . $e->getMessage());
    }
    if($sentencia->rowCount()>0){

         $respuesta["productos"] = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  
    }else{
        $respuesta["mensaje"]="El producto con cod: ".$codigo." no se encuentra en la BD";
    }
   
    $sentencia = null;
    $conexion = null;
    return $respuesta;
   

    //recuerda probarlo en la siguiente url
    //http://localhost/Proyectos/PHP/tema6/Ejercicios/Servicios_webs/Ejercicio1/servicios_rest/productos/BRAVIA2BX400
    //http://localhost/Proyectos/PHP/tema6/Ejercicios/Servicios_webs/Ejercicio1/servicios_rest/productos/B
    

}

function insertar_producto($datos){
    try {
        $conexion = new PDO("mysql:host=" . SERVIDOR_BD . ";dbname=" . NOMBRE_BD, USUARIO_BD, CLAVE_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch (PDOException $e) {
        $conexion = null;
        return array("mensaje_error" => "No he podido conectarse a la base de batos: " . $e->getMessage());
    }

    // INSERT INTO `producto`(`cod`, `nombre`, `nombre_corto`, `descripcion`, `PVP`, `familia`) 
    // VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')

    try {
       $consulta="INSERT INTO  producto (cod,nombre,nombre_corto,descripcion,PVP,familia) 
       VALUES (?,?,?,?,?,?)";
       $sentencia=$conexion->prepare($consulta);
      
       $sentencia->execute($datos);
    } catch (PDOException $e) {
        $sentencia=null;
        $conexion=null;
        return array("mensaje_error" => "No he podido conectarse a la base de batos: " . $e->getMessage());
    }

   
       $respuesta["mensaje"]="El producto con cod: ".$datos." se ha insertado correctamente";
  
  
   $sentencia = null;
   $conexion = null;
   return $respuesta;


}


