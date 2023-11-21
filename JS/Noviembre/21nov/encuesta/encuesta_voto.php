<?php
 //Se abre el fichero deonde están almacenados los datos
 $fichero = "resultado.txt";
 $contenido = file($fichero);
 //colocamos el contenido en un array y lo almacenamos en cuatro variables por equipos
 $array = explode("||", $contenido[0]);
 $op1 = $array[0];
 $op2 = $array[1];
 $op3 = $array[2];
 $op4 = $array[3];

 //extraemos el voto de los participantes
 $voto = $_GET['voto'];

 //actualizamos los votos añadiendo el recibido a los anteriores
 if ($voto == 0) {
  $op1 = $op1 + 1;
 }
 if ($voto == 1) {
  $op2 = $op2 + 1;
 }
 if ($voto == 2) {
  $op3 = $op3 + 1;
 }
 if ($voto == 3) {
  $op4 = $op4 + 1;
 }
 //creamos la cadena que se va a insertar en el fichero
 $insertvoto = $op1."||".$op2."||".$op3."||".$op4;
 //se abre el fichero como escritura y se escriben los votos actualizados
 $fp = fopen($fichero,"w");
 fputs($fp,$insertvoto);
 fclose($fp);

 // se calcula el % del voto de cada uno de los equipos
 $denominador=(int)$op1+(int)$op2+(int)$op3+(int)$op4;
 $tantoOpt1=100*round($op1/$denominador,2);
 $tantoOpt2=100*round($op2/$denominador,2);
 $tantoOpt3=100*round($op3/$denominador,2);
 $tantoOpt4=100*round($op4/$denominador,2);
?>
<h2>Resultado:</h2>
<table>
 <tr>
   <td>Opcion 1:</td>
   <td>
   <img src="barrita.gif" width='<?php echo($tantoOpt1); ?>' height='20'> <?php echo($tantoOpt1); ?>%
   </td>
 </tr>
 <tr>
   <td>Opcion 2:</td>
   <td>
   <img src="barrita.gif" width='<?php echo($tantoOpt2); ?>' height='20'> <?php echo($tantoOpt2); ?>%
   </td>
 </tr>
 <tr>
   <td>Opcion 3:</td>
   <td>
   <img src="barrita.gif" width='<?php echo($tantoOpt3); ?>' height='20'> <?php echo($tantoOpt3); ?>%
   </td>
 </tr>
 <tr>
   <td>Opcion 4:</td>
   <td>
   <img src="barrita.gif" width='<?php echo($tantoOpt4); ?>' height='20'> <?php echo($tantoOpt4); ?>%
   </td>
 </tr>
</table>