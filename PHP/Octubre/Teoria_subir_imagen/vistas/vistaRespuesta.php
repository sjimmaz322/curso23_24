<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria subir Fichero</title>
</head>

<body>
    <?php
    foreach ($_FILES["archivo"] as $key => $value) {
        echo "<p>" . $key . " - " . $value . "</p>";
    }

    ?>
</body>

</html>