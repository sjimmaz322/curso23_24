<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <form action="recogida.php" method="get" enctype="multipart/form-data">-->
    <form action="recogida.php" method="post" enctype="multipart/form-data">
        <h2>Rellena tu CV</h2>
        <p>
            <label for="name">Nombre:</label></br>
            <input id="name" type=text name="nombre" />
        </p>
        <!---->
        <p>
            <label for="ape">Apellidos:</label></br>
            <input id="ape" type=text size=40 name="ape" /></br>
        </p>
        <!---->
        <p>
            <label for="con">Contraseña:</label></br>
            <input id="con" type=password name="con" /></br>
        </p>
        <!---->
        <p>
            <label for="dni">DNI:</label></br>
            <input id="dni" type=text size=12 name="dni" /></br>
        </p>
        <!---->
        <p>
        <p>Sexo</p>
        <input type=radio id=hombre name=sex value=Hombre />
        <label for="hombre">Hombre:</label></br>
        <input type=radio id="mujer" name=sex value=Mujer />
        <label for="mujer">Mujer:</label></br>
        </p>
        <!---->
        <p>
            <label for="foto">Incluir mi foto: </label><input type=file name="foto" id="foto" accept="image/*" />
        </p>
        <!---->
        <p>
            <label for="nacido">Nacido en: </label>
            <select name="nacido" id="nacido">
                <option value="Cordoba">Córdoba</option>
                <option value="Malaga" selected>Málaga</option>
                <option value="Granada">Granada</option>
            </select>
        </p>
        <!---->
        <p>
            <label for="comment">Comentarios:</label><textarea name="comentarios" id="comment" rows=7 cols=30></textarea>
        </p>
        <!---->
        <p><input type=checkbox name="suscripcion" id="suscripcion" checked><label for="suscripcion">Subscribirme al boletín de Novedades</label></p>
        <!---->
        <p><button type=submit name="btnGuardar" value="enviado">Guardar Cambios</button>
            &nbsp;
            <button type=reset name="btnBorrar" value="borrado">Borrar los datos introducidos</button>
        </p>
    </form>
</body>

</html>