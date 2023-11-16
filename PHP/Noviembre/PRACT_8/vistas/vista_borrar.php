<?php
try {
    $consulta = "SELECT * FROM usuarios WHERE id_usuario='" . $_POST["borrarUser"] . "'";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
}

if (mysqli_num_rows($resultado) > 0) {
    $datos_usuario = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);

    echo "<table>";
    echo "<tr><th>Campo</th><td>Valor</td></tr>";
    echo "<tr>";
    echo "<th>ID:</th><td>" . $datos_usuario["id_usuario"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Usuario:</th><td>" . $datos_usuario["usuario"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Clave:</th><td>" . $datos_usuario["clave"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Nombre:</th><td>" . $datos_usuario["nombre"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>DNI:</th><td>" . $datos_usuario["dni"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Sexo:</th><td>" . $datos_usuario["sexo"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Foto:</th>";
    echo "<td><img class='profile' src='img/" . $datos_usuario["foto"] . "'></td>";
    echo "</tr>";
    echo "</table>";

    echo "<form action='index.php' method='post'>";
    echo "<p>¿Seguro que desea eliminar <strong>DEFINITIVAMENTE</strong> a este usuario?</p>";
    echo "<p><button type='submit' name='borrarDef' id='borrarDef'>Borrar</button><button type='submit'>Volver</button></p>";
    echo "</form>";

    if(isset($_POST["borrarDef"])) {
        $id_borrar = $_POST["borrarUser"];

        
        $orden_borrado = "DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` =" .$id_borrar;
        $resultado = mysqli_query($conexion, $orden_borrado);

        
        $reiniciar_autoincrement = "ALTER TABLE usuarios AUTO_INCREMENT = 1";
        $resultado_reset = mysqli_query($conexion, $reiniciar_autoincrement);

        
        header("Location: index.html");
        mysqli_close($conexion);
        exit();
    }
} else {
    echo "<p>El usuario seleccionado ya no se encuentra registrado en la BD</p>";
}
?>
