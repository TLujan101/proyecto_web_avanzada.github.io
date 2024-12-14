<?php
session_start();
if(!$_SESSION['docente_id']) header('location:index.html');
?>

<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    //Capturar los campos del formulario
    $nombre = $_POST['nombre'];
    //Preparamos la consulta para insertar datos

    $query=$pdo->prepare("DELETE FROM grados WHERE nombre=?");
    if($query->execute([$nombre])){
        echo"GRADOS ELIMINADOS CON EXITO";
    }
    else {
        echo"ERROR AL ELIMINAR EL GRADO" . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Grado</title>
    <link rel="shortcut icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div>
<h2>REGISTRO GRADO</h2>
    <form method="POST">
        <label for="nombre">NOMBRE</label>
        <input type="text" name="nombre" required >
        <br><br><button type="submit">ELIMINAR</button>
        <br><br><a href="menu.php">VOLVER AL MENU</a>
</div>
</body>
</html>