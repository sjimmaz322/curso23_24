<?php
try {
    $consulta = "SELECT asignaturas.denominacion, notas.nota FROM asignaturas,notas WHERE asignaturas.cod_asig = notas.cod_asig and cod_alu = " . $_POST['alumno'];
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die(errorPage($e));
}
if (mysqli_num_rows($resultado) > 0) {
    $alumno = mysqli_fetch_assoc($resultado);
    echo "<h2>Notas del Alumno: " . $nombre_alumno. "</h2>";

}