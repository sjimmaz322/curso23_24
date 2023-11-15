<?php
$cap = $_REQUEST["capital"];
$in = $_REQUEST["interes"];
$plaz = $_REQUEST["plazo"];


function calculador($c, $i, $p)
{
    $resultado = $c * ($i / 100) * ($p / 12);

    echo "Su cuota mensual será de: ". $resultado." €.";
}
calculador($cap, $in, $plaz);
