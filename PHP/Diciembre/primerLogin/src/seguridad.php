<?php
//Controlamos el baneo
try {
    $conection = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BBDD);
} catch (Exception $e) {
    session_destroy();
    die(error_page("ERROR", $e));
}
try {
    $consulta = "SELECT * FROM usuarios WHERE usuario = '" . $_SESSION["usuario"] . "' AND clave = '" . ($_SESSION["clave"]) . "'";
    $resultado = mysqli_query($conection, $consulta);
} catch (Exception $e) {
    session_destroy();
    die(error_page("ERROR", $e));
}
if (mysqli_num_rows($resultado) <= 0) {
    mysqli_free_result($resultado);
    mysqli_close($conection);
    session_destroy();
    $_SESSION["seguridad"] = "Usted ya no se encuentra registrado en la BBDD";
    header("Location:index.php");
    exit;
}
$datos = mysqli_fetch_assoc($resultado);
mysqli_free_result($resultado);

//Controlamos el tiempo de inactividad
$tiempo_actual = time();

if (time() - $_SESSION["ultima_accion"] > SEGUNDOS * 60) {
    mysqli_close($conection);
    session_unset();
    $_SESSION["seguridad"] = "Su tiempo de sesión ha caducado";
    header("Location:index.php");
    exit;
}
$_SESSION["ultima_accion"] = time();
