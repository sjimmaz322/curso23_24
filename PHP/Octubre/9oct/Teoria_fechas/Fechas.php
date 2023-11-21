<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>

<body>
    <h1>Teoría de fechas</h1>
    <?php
    echo "<p>" . time() . "</p>";
    echo "<p>" . date("d-m-y") . "</p>";
    echo "<p>" . date("d-m-y / h:i:s") . "</p>";
    echo "<p>" . date("d-M-Y") . "</p>";
    echo "<p>" . date("D-d-M-Y") . "</p>";
    echo "<p>" . checkdate(2, 29, 2023) . "</p>";
    echo "<p>" . date("d-m-y", mktime(0, 0, 0, 1, 1, 1994)) . "</p>";
    echo "<p>" . strtotime("09/23/1976") . "</p>";

    echo "<h2>Funciones de mates</h2>";
    print "<p>" . floor(6.5) . "</p>";
    print "<p>" . ceil(6.5) . "</p>";
    print "<p>" . abs(-8) . "</p>";
    printf("<p>%.2f</p>", 5.666 * 7.888);
    $resultado = sprintf("<p>%.2f</p>", 5.666 * 7.888);
    echo $resultado;
    echo "<p>Bucle for:</p>";
    for ($i = 1; $i <= 20; $i++) {
        /*
        if ($i < 10) {
            echo "<p>0" . $i . "</p>";
        } else {
            echo "<p>" . $i . "</p>";
        }
        */
        echo "<p>" . sprintf("%02d", $i) . "</p>";
    }
    ?>
</body>

</html>