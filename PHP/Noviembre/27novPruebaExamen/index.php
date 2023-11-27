<?php
require("vistas/ctes.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen de prueba</title>
</head>

<body>
    <h1>Notas de alumnos:</h1>
</body>

<?php
require("vistas/vista_form.php");

if (isset($_POST["btnVer"])) {
    require("vistas/vista_notas_alumno.php");
}
?>


</html>