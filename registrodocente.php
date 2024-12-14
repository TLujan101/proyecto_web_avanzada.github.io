<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Docentes</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="css/logo.png" type="image/x-icon">

</head>
<body>
    <div>
    <h2>REGISTRO <br>DE DOCENTES</h2>
    <form action="procesar.php" method="POST">
        <label for="nombre">NOMBRE</label>
        <input type="text" name="nombre" required>
        <br><br>
        <label for="correo">CORREO</label>
        <input type="mail" name="correo" required>
        <br><br>
        <label for="contrasena">CONTRASEÑA</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br><br>
        <button type="submit" >CREAR</button>
    </form>
    <br><a href="index.html">VOLVER</a>
    </div>
</body>
</html>