<?php


//
echo "<h2>Agregar Nuevo Usuario:</h2>";
//
echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
echo "<label for='nuevoNombre'><strong>Nombre:</strong></label><br>";

echo "<input type='text' name='nuevoNombre' id='nuevoNombre' placeholder='Nombre...' value='" . (isset($_POST['nuevoNombre']) ? $_POST['nuevoNombre'] : '') . "'>";

if (isset($_POST["btnGuardar"]) && $error_nombre) {
    if ($_POST["nuevoNombre"] == "") {
        echo "<span class='error'> * El campo es obligatorio *</span>";
    } else {
        echo "<span class='error'> * La longitud máxima para este campo ha sido superada *</span>";
    }
}
echo "<br>";
echo "<label for='nuevoUsuario'><strong>Usuario:</strong></label><br>";
echo "<input type='text' name='nuevoUsuario' id='nuevoUsuario' placeholder='Usuario...'value='" . (isset($_POST['nuevoUsuario']) ? $_POST['nuevoUsuario'] : '') . "'>";
if (isset($_POST["btnGuardar"]) && $error_usuario) {
    if ($_POST["nuevoUsuario"] == "") {
        echo "<span class='error'> * El campo es obligatorio *</span>";
    } else if (yaEstaba("usuarios", "usuario", $_POST["nuevoUsuario"])) {
        echo  "<span class='error'> * Ya hay un registro con ese nombre de usuario *</span>";
    } else {
        echo "<span class='error'> * La longitud máxima para este campo ha sido superada *</span>";
    }
}
echo "<br>";
echo "<label for='nuevaContra'><strong>Contraseña:</strong></label><br>";
echo "<input type='password' name='nuevaContra' id='nuevaContra' placeholder='Contraseña...'>";
if (isset($_POST["btnGuardar"]) && $error_clave) {
    if ($_POST["nuevaContra"] == "") {
        echo "<span class='error'> * El campo es obligatorio *</span>";
    } else {
        echo "<span class='error'> * La longitud máxima para este campo ha sido superada *</span>";
    }
}
echo "<br>";
echo "<label for='nuevoDni'><strong>DNI:</strong></label><br>";
echo "<input type='text' name='nuevoDni' id='nuevoDni' placeholder='Dni...'value='" . (isset($_POST['nuevoDni']) ? $_POST['nuevoDni'] : '') . "'>";
if (isset($_POST["btnGuardar"]) && $error_dni) {
    if ($_POST["nuevoDni"] == "") {
        echo "<span class='error'> * El campo es obligatorio *</span>";
    } else if (yaEstaba("usuarios", "dni", $_POST["nuevoDni"])) {
        echo  "<span class='error'> * Ya hay un registro con ese nombre de usuario *</span>";
   /* } else if (letraCorrectaDni($_POST["nuevoDni"])) {
        echo  "<span class='error'> * La letra no corresponde a ese número de DNI *</span>";*/
    } else {
        echo "<span class='error'> * Formato no correcto, el formato es 12345678-L *</span>";
    }
}
echo "<br>";
echo "<label><strong>Sexo:</strong></label>";
if (isset($_POST["btnGuardar"]) && $error_sexo) {
    echo "<span class='error'> * Debe seleccionar una de las opciones * </span>";
}
?>
<br>
<input type=radio id=hombre name=sex value=hombre <?php if (isset($_POST["sex"]) && $_POST["sex"] == "hombre") echo "checked"; ?> />
<label for="hombre">Hombre</label><br>
<input type=radio id="mujer" name=sex value=mujer <?php if (isset($_POST["sex"]) && $_POST["sex"] == "mujer") echo "checked"; ?> />
<label for="mujer">Mujer</label><br>
<input type=radio id="otro" name=sex value=otro <?php if (isset($_POST["sex"]) && $_POST["sex"] == "otro") echo "checked"; ?> />
<label for="otro">Otro</label><br>
<?php
echo "<p>";
echo "<label for='pic'>Incluir mi foto (Max. 500KB)</label><input name='pic' id='pic' type='file' accept='image/png'>";
if (isset($_POST["btnGuardar"]) && $error_form) {
    if ($_FILES["pic"]["name"] != "") {
        if ($_FILES["pic"]["size"] > 500 * 1240) {
            echo "<span class='error'> * El archivo es demasiado grande. Tam. máximo 500 * </span>";
        } else if ($_FILES["pic"]["type"] != "image/png") {
            echo "<span class='error'> * El archivo seleccionado no es una imagen con el formato .PNG * </span>";
        } else {
            echo "<span class='error'> * No se ha podido subir el archivo al servidor * </span>";
        }
    }
}
echo "</p>";
//
echo "<p>
        <button type='submit' name='btnGuardar' id='btnGuardar'>Guardar cambios</button>
        <button type='submit' name='volver' id='volver' >Volver</button>
</p>";
echo "</form>";

?>
<!---->