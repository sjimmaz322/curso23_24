<?php
echo "<h2>Agreguemos una nueva película. </h2>";

echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
//
echo "<p>";
echo "<label for='nombrePeli'><strong>Título de la película:</strong></label><br>";
echo "<input type='text' name='nombrePeli' id='nombrePeli' placeholder='Título...' value='" . (isset($_POST['nombrePeli']) ? $_POST['nombrePeli'] : '') . "'>";
//

if (isset($_POST["btnAgregar"]) && $error_nombre) {
    if ($_POST['nombrePeli'] == "") {
        echo "<span class='error'> * El campo es obligatorio * </span>";
    } else {
        echo "<span class='error'> * La longitud máxima para este campo ha sido superada * </span>";
    }
}
//
echo "</p>";
echo "<p>";
echo "<label for='directorPeli'><strong>Nombre del director:</strong></label><br>";
echo "<input type='text' name='directorPeli' id='directorPeli' placeholder='Director...' value='" . (isset($_POST['directorPeli']) ? $_POST['directorPeli'] : '') . "'>";
//
if (isset($_POST["btnAgregar"]) && $error_director) {
    if ($_POST["directorPeli"] == "") {
        echo "<span class='error'> * El campo es obligatorio * </span>";
    } else {
        echo "<span class='error'> * La longitud máxima para este campo ha sido superada * </span>";
    }
}
//
echo "</p>";
echo "<p>";
echo "<label for='trama'><strong>Sinopsis:</strong></label><br>";
echo "<input type='text' name='trama' id='trama' placeholder='Sinopsis...' value='" . (isset($_POST['trama']) ? $_POST['trama'] : '') . "'>";
//
if (isset($_POST["btnAgregar"]) && $error_trama) {
    if ($_POST["trama"] == "") {
        echo "<span class='error'> * El campo es obligatorio * </span>";
    }
}
//
echo "</p>";
echo "<p>";
echo "<label for='tema'><strong>Temática:</strong></label><br>";
echo "<input type='text' name='tema' id='tema' placeholder='Temática...' value='" . (isset($_POST['tema']) ? $_POST['tema'] : '') . "'>";
//
if (isset($_POST["btnAgregar"]) && $error_tema) {
    if ($_POST["tema"] == "") {
        echo "<span class='error'> * El campo es obligatorio * </span>";
    } else {
        echo "<span class='error'> * La longitud máxima para este campo ha sido superada * </span>";
    }
}
//
echo "</p>";
echo "<p>";
echo "<label for='pic'>Carátula (Max. 500KB)</label><input name='pic' id='pic' type='file' accept='image/*'>";
if (isset($_POST["btnAgregar"]) && $error_agregar) {
    if ($_FILES["pic"]["name"] != "") {
        if ($_FILES["pic"]["size"] > 1024 * 1024) {
            echo "<span class='error'> * El archivo es demasiado grande. Tam. máximo 500 * </span>";
        } else if (!in_array($formato, $formatos_validos)) {
            echo "<span class='error'> * El archivo seleccionado no es una imagen con un formato válido * </span>";
        } else {
            echo "<span class='error'> * No se ha podido subir el archivo al servidor * </span>";
        }
    }
}
echo "</p>";
//
echo "<p>
        <button type='submit' name='btnAgregar' id='btnAgregar'>Añadir película</button>
        <button type='submit' name='volver' id='volver' >Volver</button>
</p>";
echo "</form>";
if (isset($_POST["btnAgregar"]) && !$error_agregar) {
    //
    $consulta = "SELECT MAX(idPelicula) AS max_id FROM peliculas";
    $resultado = mysqli_query($conexion, $consulta);
    $tupla = mysqli_fetch_assoc($resultado);
    $last_index = $tupla["max_id"] + 1;
    //
    $nombre_foto = ($_FILES["pic"]["name"] == "") ? "no_imagen.jpg" : "img_" . $last_index . ".png";
    move_uploaded_file($_FILES["pic"]["tmp_name"], "img/" . $nombre_foto);
    //        
    $insersion = "INSERT INTO peliculas (titulo, director, sinopsis, tematica, caratula) VALUES ('{$_POST['nombrePeli']}', '{$_POST['directorPeli']}', '{$_POST['trama']}', '{$_POST['tema']}', '$nombre_foto')";
    $resultado = mysqli_query($conexion, $insersion);
    //
    if($_FILES["pic"]["name"]!=""){
    $_SESSION["mensaje"]="Película añadida a la base de datos con éxito";
    }else{
        $_SESSION["mensaje"]="Película añadida a la base de datos con éxito, pero con carátula por defecto";
    }
    header("Location: index.php");
    mysqli_close($conexion);
    exit();
}
