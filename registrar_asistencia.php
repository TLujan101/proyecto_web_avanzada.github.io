<?php
session_start();
if(!$_SESSION['docente_id']) header('location:index.html');
?>

<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    //Capturar los campos del formulario
    $fecha = $_POST['fecha'];
    $estudiante_id = $_POST['estudiante_id'];
    $estado = $_POST['estado'];
    $docente_id = $_POST['docente_id'];
    //Preparamos la consulta para insertar datos

    $query=$pdo->prepare("INSERT INTO asistencias(fecha,estudiante_id,estado, docente_id) VALUES (?,?,?,?)");
    if($query->execute([$fecha, $estudiante_id, $estado, $docente_id])){
        echo"ASISTENCIA REGISTRADA CON EXITO";
    }
    else {
        echo"ERROR AL REGISTRAR LA ASISTENCIA" . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" href="css/logo.png" type="image/x-icon">
    <div>
<body>
    <h2>REGISTRO ESTUDIANTE</h2>
    <form method="POST">
        <label for="fecha">FECHA</label>
        <input type="date" name="fecha" required >

        <label for="estudiante_id">ESTUDIANTE</label>
        <select name="estudiante_id" required>
            <?php
            $estudiantes=$pdo->query("SELECT * FROM estudiantes")->fetchAll();
            foreach($estudiantes as $estudiante){
                echo"<option value='{$estudiante['id']}'>{$estudiante['nombre']}</option value>";
            }
            ?>
        </select>

        <label for="estado">ESTADO</label>
        <input type="enum('Presente', 'Ausente')utf8mb4_general_ci" name="estado" required >

        <label for="docente_id">DOCENTE DIRECTOR</label>
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
</head>