<?php
session_start();
if(!$_SESSION['docente_id']) header('location:index.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="css/logo.png" type="image/x-icon">
</head>
<body>
<div>
<ul>
    <h2>MENU PRINCIPAL</h2>
    <li><a href="registrar_asistencia.php" class="menu">REGISTRAR ASISTENCIA</a></li><br>
    <li><a href="registrar_estudiantes.php" class="menu">REGISTRAR ESTUDIANTES</a></li><br>
    <li><a href="actualizar_estudiantes.php" class="menu">ACTUALIZAR ESTUDIANTES</a></li><br>
    <li><a href="eliminar_estudiante.php" class="menu">ELIMINAR ESTUDIANTES</a></li><br>
    <li><a href="registrar_grado.php" class="menu">REGISTRAR GRADO</a></li><br>
    <li><a href="actualizar_grado.php" class="menu">ACTUALIZAR GRADO</a></li><br>
    <li><a href="eliminar_grado.php"class="menu">ELIMINAR GRADO</a></li><br>
    <li><a href="index.html">SALIR</a></li>
</ul>
</div>
</body>
</html>