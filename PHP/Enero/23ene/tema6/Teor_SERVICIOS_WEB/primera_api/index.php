<?php

/****************************************
 * LO QUE NO PUEDE FALTAR NUNCA NUNCA 
require __DIR__ . '/Slim/autoload.php';

$app= new \Slim\App;

$app->run();

 */

 require __DIR__ . '/Slim/autoload.php';

 $app= new \Slim\App;

 //REALIZAR NUESTRAS FUNCIONES
 //smp tiene 2 argumentos, '' cadena y segundo function
 //$app->get('',function(){});
$app->get('/saludo',function(){
    $respuesta["mensaje"]="Hola";

    //convertimos un array en un json. arr asociativo, nombre:mensaje - valor:hola
    echo json_encode($respuesta);
    //echo json_encode(array("mensaje"=>"hola"));


    //vamos a ver como puedo consumir este servicio...



});
// $app->post();
// $app->delete();
// $app->pull();
//{nombre} significa que es variable, lo recojo en request
$app->get('/saludo/{nombre}',function($request){

    $valor_recibido=$request->getAttribute('nombre');
    $respuesta["mensaje"]="Hola ".$valor_recibido;

    echo json_encode($respuesta);
   


});
    //METODO DE TIPO POST********************************

$app->post('/saludo',function($request){

    $valor_recibido=$request->getParam('nombre');

    $respuesta["mensaje"]="Hola ".$valor_recibido;
    
    echo json_encode($respuesta); 
});


    //METODO DE TIPO DELETE********************************

$app->delete('/borrar_saludo/{id}',function($request){

    $id_recibida=$request->getAttribute('id');

    $respuesta["mensaje"]="Se ha borrado el saludo con id:  ".$id_recibida;
    
    echo json_encode($respuesta); 
});


    //METODO DE TIPO PUT********************************
    $app->put('/actualizar_saludo/{id}',function($request){

        $id_recibida=$request->getAttribute('id');
        $nombre_nuevo=$request->getParam('nombre');
        $respuesta["mensaje"]="Se ha actualizado el saludo con 
        id:  ".$id_recibida." al nombre: ".$nombre_nuevo;
        
        echo json_encode($respuesta); 
    });


/**COMO SE LLAMA, PARAMETROS Y QUE DEVUELVE */ 


//SIEMPRE AL FINAL

$app->run();

?>