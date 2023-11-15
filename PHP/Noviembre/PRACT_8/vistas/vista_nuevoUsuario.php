<?php

if (isset($_POST["btnGuardar"])) {
    $error_usuario = $_POST["nuevoUsuario"] == "" || strlen($_POST["nuevoUsuario"]) > 30 || yaEstaba("usuarios", "usuario", $_POST["nuevoUsuario"]);
    $error_clave = $_POST["nuevaContra"] == "" || strlen($_POST["nuevaContra"]) > 50;
    $error_nombre = $_POST["nuevoNombre"] == "" || strlen($_POST["nuevoNombre"]) > 50;
    $error_dni = $_POST["nuevoDni"] == "" || strlen($_POST["nuevoDni"]) != 10 /*|| letraCorrectaDni($_POST["nuevoDni"])*/ || yaEstaba("usuarios", "dni", $_POST["nuevoDni"]);
    $error_sexo = !isset($_POST["sex"]);
    if ($_FILES["pic"]["name"] != "") {
        $error_foto = $_FILES["pic"]["size"] > 500 * 1240 || $_FILES["pic"]["error"] || $_FILES["pic"]["type"] != "png";
        $error_form = $error_usuario || $error_clave || $error_nombre || $error_dni || $error_sexo || $error_foto;
    } else {
        $error_form = $error_usuario || $error_clave || $error_nombre || $error_dni || $error_sexo;
    }
}
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
echo "<label for='nuevoDni'><strong>Nombre:</strong></label><br>";
echo "<input type='text' name='nuevoDni' id='nuevoDni' placeholder='Dni...'value='" . (isset($_POST['nuevoDni']) ? $_POST['nuevoDni'] : '') . "'>";
if (isset($_POST["btnGuardar"]) && $error_dni) {
    if ($_POST["nuevoDni"] == "") {
        echo "<span class='error'> * El campo es obligatorio *</span>";
    } else if (yaEstaba("usuarios", "dni", $_POST["nuevoDni"])) {
        echo  "<span class='error'> * Ya hay un registro con ese nombre de usuario *</span>";
   // } else if (letraCorrectaDni($_POST["nuevoDni"])) {
   //     echo  "<span class='error'> * La letra no corresponde a ese número de DNI *</span>";
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
<input type=radio id=hombre name=sex value=Hombre <?php if (isset($_POST["sex"]) && $_POST["sex"] == "Hombre") echo "checked"; ?> />
<label for="hombre">Hombre</label><br>
<input type=radio id="mujer" name=sex value=Mujer <?php if (isset($_POST["sex"]) && $_POST["sex"] == "Mujer") echo "checked"; ?> />
<label for="mujer">Mujer</label><br>
<input type=radio id="otro" name=sex value=Otro <?php if (isset($_POST["sex"]) && $_POST["sex"] == "Otro") echo "checked"; ?> />
<label for="otro">Otro</label><br>
<?php
echo "<p>";
echo "<label for='pic'>Incluir mi foto (Max. 500KB)</label><input name='pic' id='pic' type='file' accept='image/png'>";
if (isset($_POST["btnGuardar"]) && $error_form) {
    if ($_FILES["pic"]["name"] != "") {
        if ($_FILES["pic"]["size"] > 500 * 1240) {
            echo "<span class='error'> * El archivo es demasiado grande. Tam. máximo 500 * </span>";
        } else if ($_FILES["pic"]["type"] != "png") {
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
if (isset($_POST["btnGuardar"]) && !$error_form) {
    echo "<p>Funciona</p>";
   
    $consulta = "INSERT INTO 'usuarios'('usuario', 'clave', 'nombre', 'dni', 'sexo', 'foto') VALUES ($_POST[nuevoUsuario],$_POST[nuevaClave],$_POST[nuevoNombre],$_POST[nuevoDni],$_POST[sex],$nombre_foto)";
    $resultado = mysqli_query($conexion, $consulta);
}
?>
<!---->