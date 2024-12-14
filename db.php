<?php
try {
    $pdo = new PDO("mysql:host=localhost;port=33065;dbname=registro_asistencias", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    /// Si ocurre un error muestre el mensaje y detenega la ejecuccion
    die("Error en la conexion con la base de datos. ". $e->getMessage());
}


?>

