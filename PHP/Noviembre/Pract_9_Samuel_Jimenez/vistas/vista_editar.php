<?php
try {
    if(isset($_SESSION["id"])){
        $consulta = "select * from peliculas where idPelicula=" . $_SESSION["id"];
        $resultado = mysqli_query($conexion, $consulta);
    }
    if(isset( $_POST["editarPeli"])){
        $consulta = "select * from peliculas where idPelicula=" . $_POST["editarPeli"];
        $resultado = mysqli_query($conexion, $consulta);
    }
} catch (Exception $e) {
    session_destroy();
    mysqli_close($conexion);
    die(error_page("Error de Conexión", "<h1>Error de conexión</h1><p>No he podido conectarse a la base de batos: " . $e->getMessage() . "</p>"));
}

$peli = mysqli_fetch_array($resultado);
$_SESSION["id"]= $peli["idPelicula"];
echo "<h2>Editar la película: " . $peli["titulo"] . "</h2>";
echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
echo "<table>";
echo "<tr><th>Datos</th><th>Carátula</th></tr>";
echo "<tr><td>";
echo "<label for='title'>Título de la película</lable><br>";
echo "<input type='text' name='title' id='title' value='" . $peli["titulo"] . "'>";
echo "</td><td class='noBot'>";
echo "<img class='profile' src='img/" . $peli['caratula'] . "'><br>";
echo "<form action='index.php' method='post'>";
echo "<button type='submit' name='borrarCaratula' name='borrarCaratula' value='" . $peli["idPelicula"] . "'>Eliminar carátula</button>";
echo "</form>";
echo "</td></tr>";
echo "<tr><td>";
echo "<label for='dire'>Director de la película</lable><br>";
echo "<input type='text' name='dire' id='dire' value='" . $peli["director"] . "'>";
echo "</td></tr>";
echo "<tr><td>";
echo "<label for='genero'>Temática de la película</lable><br>";
echo "<input type='text' name='genero' id='genero' value='" . $peli["tematica"] . "'>";
echo "</td></tr>";
echo "<tr><td>";
echo "<label for='sinop'>Sinopsis de la película</lable><br>";
echo "<textarea name='sinop' id='sinop' rows='10' cols='50'>" . $peli["sinopsis"] . "</textarea>";
echo "</td></tr>";
echo "<tr><td colspan='2' >Cambiar carátula de la película: <input name='pic2' id='pic2' type='file' accept='image/*'></td></tr>";
echo "<tr><td colspan='2' >";
echo "<button type='submit' name='edit' id='edit' value='".$_SESSION["id"]."'>Editar película</button><button type='submit'>Volver</button>";
echo "</td></tr>";
echo "</table>";
echo "</form>";
