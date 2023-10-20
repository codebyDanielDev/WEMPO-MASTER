<?php
session_start();
include "../db_conectar/conexion.php";
include "../includes/funciones_usuarios.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usuario = $_SESSION['id_usuario'];
    $usuario = obtenerUsuarioPorId($id_usuario);


    // Actualizar la información del usuario
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $email = $_POST['email'];
    $dni = $_POST['dni'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $imagen = $_FILES['imagen'];
    $imagen = isset($_FILES['imagen']) ? $_FILES['imagen'] : NULL;

    
    
    if(actualizarUsuario($id_usuario, $nombre, $apellido_paterno, $apellido_materno, $email, $dni, $fecha_nacimiento, $direccion, $ciudad, $imagen)){
        echo json_encode(['status' => 'success', 'message' => 'Usuario actualizado exitosamente.']);
    } else{
        echo json_encode(['status' => 'error', 'message' => 'Error actualizar usuario.']);
    }


}