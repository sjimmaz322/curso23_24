<?php
try {
    $consulta = "select * from peliculas where idPelicula=" . $_POST["borrarCaratula"];
    $resultado = mysqli_query($conexion, $consulta);
} catch (Exception $e) {
    mysqli_close($conexion);
    die(error_page("Error de Conexión", "<h1>Error de conexión</h1><p>No he podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
}
$peli = mysqli_fetch_array($resultado);
$nom_caratula = $peli["caratula"];
$_SESSION["id"] = $peli["idPelicula"];
if ($nom_caratula != "no_img.jpg") {
    echo "<h2>Se dispone a borrar la carátula de la película " . strtoupper($peli["titulo"]) . " </h2>";
    echo "<table>";
    echo "<tr>";
    echo "<td>Cambiará esta carátula:</td>";
    echo "<td><img class='profile' src='img/" . $peli["caratula"] . "'></td>";
    echo "<td>por esta otra:</td>";
    echo "<td><img class='profile' src='img/no_img.jpg'></td>";
    echo "</tr>";
    echo "</table>";
    echo "<form action='index.php' method='post'>";
    echo "<button type='submit' name='confBorrar' id='confBorrar' value='" . $_SESSION["id"] . "'>Borrar</button>";
    echo "<button type='submit'>Volver</button>";
    echo "</form>";
} else {
    echo "<h2>La película " . strtoupper($peli["titulo"]) . " no tiene carátula, no hay ninguna que borrar.</h2>";
    echo "<form action='index.php' method='post'>";
    echo "<button type='submit'>Volver</button>";
    echo "</form>";
}
