<?php
if (isset($_POST["btnEnviar"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h1>Recogida de los datos de la práctica 2</h1>
        <?php
        echo "Nombre:" . $_POST["name"];
        echo "<p><strong>Nacido en: </strong>" . $_POST["nacido"] . "</p>";
        if (isset($_POST["sex"])) {
            echo "<p><strong>Sexo: </strong>" . $_POST["sex"] . "</p>";
        } else {
            echo "<p><strong>Sexo: </strong>" . "Otro" . "</p>";
        }
        if (isset($_POST["deporte"])) {
            echo "<p><strong>Sus aficiones son:</strong> El deporte</p>";
        }
        if (isset($_POST["lectura"])) {
            echo "<p><strong>Sus aficiones son:</strong> La lectura</p>";
        }
        if (isset($_POST["otro"])) {
            echo "<p><strong>Sus aficiones son:</strong> Otras cosas</p>";
        }
        echo "<p><strong>Comentarios: </strong>" . $_POST["comentarios"] . "</p>";
        ?>
    </body>

    </html>
<?php
} else {
    header("location:index.php");
}
?>