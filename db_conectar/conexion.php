<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = 'admin1234';
$base_datos = 'new_sen_proyect_ventas';

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
} else {
    
    //echo "Conexión exitosa a la base de datos!";
    
}