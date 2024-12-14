<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $correo=$_POST['correo'];
    $contrasena=$_POST['contrasena'];


    //EJECUTAR CONSULTAS
    $query= $pdo->prepare("SELECT * FROM docentes WHERE correo= ?");
    $query->execute([$correo]);
    $docente=$query->fetch();

    if ($docente && password_verify($contrasena, $docente['contrasena'])){
        $_SESSION['docente_id']=$docente['id'];
        $_SESSION['docente_nombre']=$docente´['nombre'];
        header("location:menu.php");
        exit();
    }

    else{
        echo"CREDENCIALES INVALIDAS";
    }
    
} 


?>