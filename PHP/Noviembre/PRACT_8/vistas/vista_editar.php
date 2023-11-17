<?php
//$conexion = mysqli_connect("localhost", "jose", "josefa", "bd_cv");
try {
    $consulta = "select * from usuarios where id_usuario='" . $_POST["editarUser"] . "'";
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die("<p>No se ha podido realizar la consulta: " . $e->getMessage() . "</p></body></html>");
}
//
if (mysqli_num_rows($resultado) > 0) {
    $datos_user = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);
    //------------------
    echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
    echo "<label for='cNombre'><strong>Nombre:</strong></label><br>";

    echo "<input type='text' name='cNombre' id='cNombre' placeholder='Nombre...' value='" . $datos_user["nombre"]  . "'>";
    echo "<br>";
    echo "<label for='nuevoUsuario'><strong>Usuario:</strong></label><br>";
    echo "<input type='text' name='cUsuario' id='cUsuario' placeholder='Usuario...'value='" . $datos_user["usuario"] . "'>";
    echo "<br>";
    echo "<label for='nuevaContra'><strong>Contraseña:</strong></label><br>";
    echo "<input type='password' name='cContra' id='cContra' placeholder='Contraseña...'value='" . $datos_user["clave"] . "'>";

    echo "<br>";
    echo "<label for='nuevoDni'><strong>DNI:</strong></label><br>";
    echo "<input type='text' name='cDni' id='cDni' placeholder='Dni...'value='" . $datos_user["dni"] . "'>";
    echo "<br>";
    echo "<label><strong>Sexo:</strong></label>";
?>
    <br>
    <input type=radio id=hombre name=sex value=hombre <?php if ($datos_user["sexo"] == "hombre") echo "checked"; ?> />
    <label for="hombre">Hombre</label><br>
    <input type=radio id="mujer" name=sex value=mujer <?php if ($datos_user["sexo"] == "mujer") echo "checked"; ?> />
    <label for="mujer">Mujer</label><br>
    <input type=radio id="otro" name=sex value=otro <?php if ($datos_user["sexo"] == "otro") echo "checked"; ?> />
    <label for="otro">Otro</label><br>
<?php
    echo "<p>";
    echo "<img class='profile' src='img/" . $datos_user["foto"] . "'></p>";
    echo "<p>";
    echo "<label for='cpic'>Cambiar foto (Max. 500KB)</label><input name='cpic' id='cpic' type='file' accept='image/png'>";
    if (isset($_POST["btnEditar"]) && $error_edicion) {
        if ($_FILES["cpic"]["name"] != "") {
            if ($_FILES["cpic"]["size"] > 500 * 1240) {
                echo "<span class='error'> * El archivo es demasiado grande. Tam. máximo 500 * </span>";
            } else if ($_FILES["cpic"]["type"] != "image/png") {
                echo "<span class='error'> * El archivo seleccionado no es una imagen con el formato .PNG * </span>";
            } else {
                echo "<span class='error'> * No se ha podido subir el archivo al servidor * </span>";
            }
        }
    }
    echo "</p>";
    //
    echo "<p>
        <button type='submit' name='btnEditar' id='btnEditar' value='" . $datos_user["id_usuario"] . "'>Guardar cambios</button>
        <button type='submit' name='volver' id='volver' >Volver</button>
</p>";
    echo "</form>";
}

if (isset($_POST["btnEditar"]) && !$error_edicion) {
    header("Location: index.php");
    mysqli_close($conexion);
    exit();
}
?>