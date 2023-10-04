<?php
function LetraNIF($dni)
{
    return substr("TRWAGMYFPDXBNJZSQVHLCKEO", $dni % 23, 1);
}
function dni_bien_escrito($dni)
{
    return strlen($dni) == 9 && is_numeric(substr($dni, 0, 8)) && substr($dni, -1) >= "A" && substr($dni, -1) <= "Z";
}
function dni_valido($dni)
{
    return substr($dni, -1) == LetraNIF(substr($dni, 0, 8));
}


if (isset($_POST["btnBorrar"])) {

    unset($_POST);
    //Otra forma menos correcta
    //header("Location:index.php) 
    //exit;
}
