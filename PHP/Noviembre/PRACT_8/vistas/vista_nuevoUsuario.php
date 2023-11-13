<?php
function sacarLetraNIF($dni)
{
    $valor = (int) ($dni / 23);
    $valor *= 23;
    $valor = $dni - $valor;
    $letras = "TRWAGMYFPDXBNJZSQVHLCKEO";
    $letraNif = substr($letras, $valor, 1);
    return $letraNif;
}

if (isset($_POST["btnGuardar"])) {
    $error_usuario = $_POST["nuevoUsuario"] == "" || strlen($_POST["nuevoUsuario"]) > 30;
    $error_clave = $_POST["nuevaContra"] == "" || strlen($_POST["nuevaCuentra"]) > 50;
    $error_nombre = $_POST["nuevoNombre"] == "" || strlen($_POST["nuevoNombre"]) > 50;
    $error_dni = $_POST["nuevoDni"] == "" || strlen($_POST["nuevoDni"]) != 10 || sacarLetraNIF(substr($_POST["nuevoDni"], 0, 8)) != substr($_POST["nuevoDni"], -1);
}
//
echo "<h2>Agregar Nuevo Usuario:</h2>";
//
echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
echo "<label for='nuevoNombre'><strong>Nombre:</strong></label><br>";
echo "<input type='text' name='nuevoNombre' id='nuevoNombre' placeholder='Nombre...'>";
echo "<br>";
echo "<label for='nuevoUsuario'><strong>Usuario:</strong></label><br>";
echo "<input type='text' name='nuevoUsuario' id='nuevoUsuario' placeholder='Usuario...'>";
echo "<br>";
echo "<label for='nuevaContra'><strong>Contraseña:</strong></label><br>";
echo "<input type='password' name='nuevaContra' id='nuevaContra' placeholder='Contraseña...'>";
echo "<br>";
echo "<label for='nuevoDni'><strong>Nombre:</strong></label><br>";
echo "<input type='text' name='nuevoDni' id='nuevoDni' placeholder='Dni...'>";
echo "<br>";
echo "<label><strong>Sexo:</strong></label><br>";
echo "<input type='radio' id='sexo' name='hombre' value='hombre'><label>Hombre:</label><br>";
echo "<input type='radio' id='sexo' name='mujer' value='mujer'><label>Mujer:</label><br>";
echo "<p>";
echo "<label for='pic'>Incluir mi foto (Max. 500KB)</label><input type='file' accept='image/png'>";
echo "</p>";
//
echo "<p>
        <button type='submit' name='btnGuardar' id='btnGuardar'>Guardar cambios</button>
        <button type='submit'>Volver</button>
</p>";
echo "</form>";
?>
<!---->