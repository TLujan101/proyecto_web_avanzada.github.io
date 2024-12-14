<?php
//Iniciar Sesion
session_start();

//Incluir la Conexion a la base de datos
include 'db.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    //Capturar los datos enviados por html 
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];

    //Validar que los datos no esten vacios

    if(!empty($nombre) && !empty($correo) && !empty($contrasena)){
        //Encriptamos la contraseña
        $contrasena_encriptada=password_hash($contrasena, PASSWORD_DEFAULT);
        try {
            // Preparar la consulta para insertar los datos
            $query=$pdo->prepare("INSERT INTO docentes(nombre,correo,contrasena) VALUES (?,?,?)");
            $query->execute([$nombre,$correo,$contrasena_encriptada]);
            
            echo"Docente Registrado exitosamente.";

        }   catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "El correo ya esta registrado.";
            } else {
                echo "Error: " . $e->getMessage();
            }
        }
    } else {
        echo "Por favor, Complete todos los campos";
    }
}


?>