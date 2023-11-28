<?php
try {
    $consulta = "select * from alumnos;";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die(errorPage($e));
}
if (mysqli_num_rows($resultado) > 0) {
    echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
    echo "<label for='alumno'>Seleccione un Alumno:</label>";
    echo " <select name='alumno' id='alumno'>";
    while ($tupla = mysqli_fetch_assoc($resultado)) {
        if (isset($_POST["alumno"]) && $_POST["alumno"] === $tupla["cod_alu"]) {
            echo "<option value='" . $tupla["cod_alu"] . "' selected>" . $tupla["nombre"] . "</option>";
            $nombre_alumno = $tupla["nombre"];
        } else {
            echo "<option value='" . $tupla["cod_alu"] . "'>" . $tupla["nombre"] . "</option>";
        }
    }
    echo "</select>";
    echo "<button type='input' name='btnVer' id='btnVer'>Ver Notas</button>";
    echo "</form>";
} else {
    echo "<p>En estos momentos no tenemos ningún alumno en la BD.</p>";
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
