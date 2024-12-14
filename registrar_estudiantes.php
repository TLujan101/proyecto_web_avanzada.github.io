<?php
session_start();
if(!$_SESSION['docente_id']) header('location:index.html');
?>

<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    //Capturar los campos del formulario
    $nombre = $_POST['nombre'];
    $documento = $_POST['documento'];
    $grado_id = $_POST['grado_id'];
    $docente_id = $_POST['docente_id'];
    //Preparamos la consulta para insertar datos

    $query=$pdo->prepare("INSERT INTO estudiantes(nombre,documento,grado_id, docente_id) VALUES (?,?,?,?)");
    if($query->execute([$nombre, $documento, $grado_id, $docente_id])){
        echo"ESTUDIANTES REGISTRADOS CON EXITO";
    }
    else {
        echo"ERROR AL REGISTRAR EL ESTUDIANTE" . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estudiantes</title>
    <link rel="shortcut icon" href="css/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<div>
<body>
    <h2>REGISTRO ESTUDIANTE</h2>
    <form method="POST">
        <label for="nombre">NOMBRE</label>
        <input type="text" name="nombre" required >
        <label for="documento">DOCUMENTO</label>
        <input type="text" name="documento" required >
        <label for="grado_id">GRADO</label>
        <select name="grado_id" required>
            <?php
            $grados=$pdo->query("SELECT * FROM grados")->fetchAll();
            foreach($grados as $grado){
                echo"<option value='{$grado['id']}'>{$grado['nombre']}</option value>";
            }
            ?>
        </select>
        <br><label for="docente_id">DOCENTE DIRECTOR</label>
        <select name="docente_id" required>
            <?php
            $docentes=$pdo->query("SELECT * FROM docentes")->fetchAll();
            foreach($docentes as $docente){
                echo"<option value='{$docente['id']}'>{$docente['nombre']}</option value>";
            }
            ?>
        </select>
        <br><br><button type="submit">REGISTRAR</button>
        <br><br><a href="menu.php">VOLVER AL MENU</a>
    </form>
    </div>
</body>
</html>