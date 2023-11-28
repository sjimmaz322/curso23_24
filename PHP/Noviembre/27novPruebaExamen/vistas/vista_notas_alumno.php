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
    echo "<h2>Notas del Alumno: " . $nombre_alumno . "</h2>";
    try {
        $consulta = "SELECT asignaturas.cod_asig, asignaturas.denominacion, notas.nota from asignaturas, notas where asignaturas.cod_asig = notas.cod_asig and notas.cod_alu =" . $_POST['alumno'];
        $resultado = mysqli_query($conexion, $consulta);
    } catch (Exception $e) {
        mysqli_close($conexion);
        die(errorPage($e));
    }
    echo "<table>";
    echo "<tr><th>Asignatura</th><th>Nota</th><th>Acción</th></tr>";
    while ($tupla = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $tupla["denominacion"] . "</td><td>" . $tupla["nota"] . "</td><td><form action='index.php' method='post' enctype='multipart/form-data'><button type='submit' id='btnBorrar' name='btnBorrar' value='" . $tupla['cod_asig'] . "'>Borrar</button><button type='submit' id='btnEditar' name='btnEditar' value='" . $tupla['cod_asig'] . "'>Editar</button><input type='hidden' name='alumno' value='" . $_POST['alumno'] . "'></form></td></tr>";
    }
    echo "</table>";
}
try {
    $consulta = "SELECT asignaturas.cod_asig, asignaturas.denominacion from asignaturas where asignaturas.cod_asig not in (SELECT asignaturas.cod_asig, asignaturas.denominacion, notas.nota from asignaturas, notas where asignaturas.cod_asig = notas.cod_asig and notas.cod_alu =" . $_POST['alumno'] . ")";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die(errorPage($e));
}
if (mysqli_num_rows($resultado) > 0) {
?>
    <form action="index.php" method="post">
        <p>
            <button type="hidden" name="alumno" value=""></button>
            <label for="asignatura">Asignaturas que le quedan a <?php echo $nombre_alumno ?> por calificar: </label>
            <selec name="asignatura">
                <?php
                while ($tupla = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='" . $tupla["cod_asig"] . "'>" . $tupla["denominacion"] . "</option>";
                }
                ?> </selec>
            <button type="submit" name="btnCalificar" id="btnCalificar">Calificar</button>
        </p>
    </form>
<?php

} else {
    echo "<p>No quedan asignaturas por evaluar</p>";
}
/*
SELECT tabla.datos
FROM tabla1, tabla2
WHERE tabla1.clavep1 = tabla2.clavep2
AND condición
*/