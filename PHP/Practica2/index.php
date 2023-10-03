<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Esta es mi súper página</h1>
    <form action="recogida.php" method="post" enctype="multipart/form-data">
        <p> <label for="name">Nombre: </label><input type="text" name="name" id="name" required></p>

        <p> <label for="nacido">Nacido en: </label>
            <select name="nacido" id="nacido">
                <option value="Cordoba">Córdoba</option>
                <option value="Malaga" selected>Málaga</option>
                <option value="Granada">Granada</option>
            </select>
        </p>
        <p>Sexo:
            <label for="hombre">Hombre</label>
            <input type=radio id=hombre name=sex value=Hombre />
            <label for="mujer">Mujer</label>
            <input type=radio id="mujer" name=sex value=Mujer />
        </p>
        <p>
            <label>Aficiones: </label>
            <label>Deportes</label>
            <input type="checkbox" name="deporte" id="deporte" />
            <label>Lecturas </label>
            <input type="checkbox" name="lectura" id="lectura" />
            <label>Otros </label>
            <input type="checkbox" name="otros" id="otros" />
        </p>
        <p>
            <label for="comment">Comentarios:</label><textarea name="comentarios" id="comment" cols=30></textarea>
        </p>
        <p><button type=submit name="btnEnviar" value="enviado">Enviar</button></p>
    </form>
</body>

</html>